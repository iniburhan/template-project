<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Tables\FileAttachment;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class FileAttachmentController extends Controller
{
    public function index()
    {
        $fileAttachments = FileAttachment::all();
        return response()->json(['file_attachments' => $fileAttachments]);
    }

    public function store(Request $request)
    {
        // code 1st
        // $fileAttachment = FileAttachment::create([
        //     'id_document' => $request->id_document,
        //     'document_type' => $request->document_type,
        //     'created_by' => $request->created_by,
        //     'updated_by' => $request->updated_by,
        //     // Data lainnya sesuai kebutuhan
        // ]);

        // code 2nd
        $request->validate([
            'id_document' => 'required',
            'document_type' => 'required',
            'path_file' => 'required',
        ]);
        $data  = [
            'id_document' => $request->id_document,
            'document_type' => $request->document_type,
            'path_file' => $request->path_file,
            // 'created_by' => $request->created_by,
            'created_by' => Auth::user()->id,
        ];
        $insert = FileAttachment::insert($data);

        return response()->json(['message' => 'File attachment created successfully', 'file_attachment' => $insert]);

        // code 3rd
        // if (Auth::check()) {
        //     $request->validate([
        //         'id_document' => 'required',
        //         'document_type' => 'required',
        //         'path_file' => 'required',
        //     ]);

        //     $data = [
        //         'id_document' => $request->id_document,
        //         'document_type' => $request->document_type,
        //         'path_file' => $request->path_file,
        //         'created_by' => Auth::user()->id,
        //     ];
        //     $insert = FileAttachment::create($data);

        //     return response()->json(['message' => 'File attachment created successfully', 'file_attachment' => $insert]);
        // } else {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
    }

    // public function show($id)
    public function show(Request $request)
    {
        $id = $request->id;
        $fileAttachment = FileAttachment::find($id);
        if (!$fileAttachment) {
            return response()->json(['error' => 'File attachment not found'], 404);
        }

        return response()->json(['file_attachment' => $fileAttachment]);
    }

    public function update(Request $request)
    {
        $fileAttachment = FileAttachment::find($request->id);
        if (!$fileAttachment) {
            return response()->json(['error' => 'File attachment not found'], 404);
        }

        $data  = [
            'id_document' => $request->id_document,
            'document_type' => $request->document_type,
            'path_file' => $request->path_file,
            // 'updated_by' => $request->updated_by,
            'updated_by' => Auth::user()->id,
        ];
        $update = FileAttachment::where('id', $request->id)->update($data);
        // $fileAttachment->update($request->all());

        return response()->json(['message' => 'File attachment updated successfully', 'file_attachment' => $update]);
    }

    public function destroy($id)
    {
        $fileAttachment = FileAttachment::find($id);
        if (!$fileAttachment) {
            return response()->json(['error' => 'File attachment not found'], 404);
        }

        $fileAttachment->delete();

        return response()->json(['message' => 'File attachment deleted successfully']);
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required|string',
                'password' => 'required|string|min:5',
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password)) {
                throw new Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error->getMessage(),
            ], 500);
        }
    }
}
