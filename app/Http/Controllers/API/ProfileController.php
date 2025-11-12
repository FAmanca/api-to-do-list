<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
        protected $upload;

    public function __construct()
    {
        $this->upload = new UploadRepository();
    }

    public function update(User $user, Request $request){
        try {
         $validate = Validator::make($request->all(), [
                'username' => 'nullable|string|max:255',
                'email' => 'nullable|email|unique:users,email',
                'password' => 'nullable|string',
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

            $updateUser->update($data);

            if ($request->hasFile('image_path')) {
                $newImage = $request->file('image_path');

                if ($updateUser->image_path) {
                    $updateUser->image_path = $this->upload->update($updateUser->image_path, $newImage);
                } else {
                    $updateUser->image_path = $this->upload->save($newImage);
                }

                $updateUser->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Update Success',
                'list' => $list
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong',
                // 'error' => $e->getMessage()
            ], 500);
        }
    }

    }

