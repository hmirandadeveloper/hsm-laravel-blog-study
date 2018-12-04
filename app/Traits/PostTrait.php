<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait PostTrait
{
    public function getFileNameToStore(Request $request)
    {
        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // Store file
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        return $fileNameToStore;
    }
}
