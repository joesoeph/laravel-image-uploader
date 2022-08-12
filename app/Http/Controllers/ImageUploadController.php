<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'path' => 'string',
        ]);

        $files = $request->file('picture');

        // if path set in request, remove '/' from beginning and end of path
        $path = $request->has('path') ? trim($request->path, '/') : '';

        $filenameWithExt = $files->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $files->getClientOriginalExtension();

        $fileNameToStore = $filename . "_" . time() . "." . $extension;

        $files->storeAs('public/' . $path, $fileNameToStore);

        return response()->json(['picture' => [
            'name' => $fileNameToStore,
            'size' => $files->getSize(),
            'mime' => $files->getMimeType(),
            'url' => asset('storage/' . $path . '/' . $fileNameToStore),
        ]]);
    }
}
