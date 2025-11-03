<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ToDoController extends Controller
{
    public function getList()
    {
        try {

            $lists = ToDoList::paginate(10);
            if ($lists->isEmpty()) {
                 return response()->json([
                'message' => 'No Data',
            ], 200);
            }

            return response()->json([
                'message' => 'Success',
                'lists' => $lists
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something Went Wrong',
                // 'error' => $e->getMessage()
            ], 500);
        }
    }

    public function storeList(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'priority' => 'nullable|in:low,medium,high',
                'due_date' => 'nullable|date',
                'is_completed' => 'boolean'
            ]);

            $list = new ToDoList();
            $list->title = $request->input('title');
            $list->description = $request->input('description');
            $list->priority = $request->input('priority');
            $list->due_date = $request->input('due_date');
            $list->is_completed = $request->input('is_completed') == null ? 0 : $request->input('is_completed');
            $list->save();

            return response()->json([
                'message' => 'Success',
                'list' => $list
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something Went Wrong',
                // 'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateList(ToDoList $list , Request $request)
    {
        try {
             $validate = Validator::make($request->all(), [
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'priority' => 'nullable|in:low,medium,high',
                'due_date' => 'nullable|date',
                'is_completed' => 'nullable|boolean'
            ]);

              $list->update([
                 'title' => $request->title,
                 'description' => $request->description,
                 'priority' => $request->priority,
                 'due_date' => $request->due_date,
                 'is_completed' => $request->is_completed,
            ]);
            return response()->json([
                'message' => 'Update Success',
                'list' => $list
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                // 'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteList(ToDoList $list)
    {
        try {
          $list->delete();

            return response()->json([
                'message' => 'Delete Success',
                'list' => $list
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                // 'error' => $e->getMessage()
            ], 500);
        }
    }


}
