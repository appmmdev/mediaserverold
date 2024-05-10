<?php

namespace App\Http\Controllers\V1;

use App\Models\V1\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('images.upload');
    }


    public function getImages()
    {

        $images = Image::latest()->get()->map(function ($images) {
            return [
                'name' => $images->name,
                'path' => asset($images->path),
                'created_at' => $images->created_at->diffForHumans(), // Display time difference in human-readable format
            ];
        });

        return response()->json($images);
    }



    public function showImageGallery()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }



    public function upload(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480', // Adjust max file size as needed
        ]);

        foreach ($request->file('images') as $image) {
            $imageName = $image->getClientOriginalName();
            $imageDate = now()->format('d-m-Y'); // Get the current date in the format dd-mm-yyyy
            $imagePath = $image->storeAs('images/' . $imageDate, $imageName, 'local');

            Image::create([
                'name' => $imageName,
                'path' => $imagePath,
            ]);
        }

        return response()->json(['message' => 'Images uploaded successfully'], 201);
    }
}
