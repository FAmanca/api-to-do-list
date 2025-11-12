<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\UploadRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    protected $upload;

    public function __construct()
    {
        $this->upload = new UploadRepository();
    }

    public function update(User $user, Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'username' => 'nullable|string|max:255',
                'email' => 'nullable|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:6',
                'image_path' => 'nullable|mimes:jpg,jpeg,png,webp|max:5120',
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'message' => 'Invalid Data',
                    'errors' => $validate->errors()
                ], 422);
            }

            $data = [];
            $fields = ['username', 'email', 'password'];

            foreach ($fields as $field) {
                if ($request->filled($field)) {
                    if ($field === 'password') {
                        $data[$field] = Hash::make($request->password);
                    } else {
                        $data[$field] = $request->$field;
                    }
                }
            }

            if (!empty($data)) {
                $user->update($data);
            }

            if ($request->hasFile('image_path')) {
                $newImage = $request->file('image_path');

                if ($user->image_path) {
                    $user->image_path = $this->upload->update($user->image_path, $newImage);
                } else {
                    $user->image_path = $this->upload->save($newImage);
                }

                $user->save();
            }
            $user->refresh();

            return response()->json([
                'status' => true,
                'message' => 'Update Success',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }

}

