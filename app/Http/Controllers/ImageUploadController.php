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
        ]);

        $files = $request->file('picture');

        $filenameWithExt = $files->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $files->getClientOriginalExtension();

        $fileNameToStore = $filename . "_" . time() . "." . $extension;

        $files->storeAs('/public', $fileNameToStore);

        return response()->json(['picture' => [
            'name' => $fileNameToStore,
            'size' => $files->getSize(),
            'mime' => $files->getMimeType(),
            'url' => asset('storage/' . $fileNameToStore),
        ]]);
    }
}
