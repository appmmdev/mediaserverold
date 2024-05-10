<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Models\V1\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{

    public function getVideos()
    {
        $videos = Video::latest()->get()->map(function ($video) {
            return [
                'name' => $video->name,
                'path' => asset($video->path),
                'preview_img' => asset($video->preview_image_path),
                'created_at' => $video->created_at->diffForHumans(), // Display time difference in human-readable format
            ];
        });
        return response()->json($videos);
    }

    public function index()
    {
        $videos = Video::all();
        return view('videos.index', ['videos' => $videos]);
    }


    // public function destroy(Request $request)
    // {
    //     $videoId = $request->input('videoId');
    //     $video = Video::findOrFail($videoId);
    //     Storage::delete($video->path);
    //     $video->delete();
    //     return response()->json(['message' => 'Video deleted successfully']);
    // }

    public function showUploadForm()
    {
        return view('videos.upload');
    }
    public function showMultiUploadForm()
    {
        return view('videos.multiupload');
    }
    public function test()
    {
        return view('videos.test');
    }



    // Inside your upload method
    public function upload(Request $request)
    {
        // Validate the request data for both video and preview image
        $request->validate([
            'video' => 'required|file|mimes:mp4|max:10240000', // Adjust max file size as needed
            'preview_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);

        // Handle video upload
        $videoFile = $request->file('video');
        $videoDate = now()->format('d-m-Y'); // Get the current date in the format dd-mm-yyyy

        $videoNameWithoutSpace = str_replace(' ', '', $videoFile->getClientOriginalName()); // Remove spaces from the original filename

        $videoPath = $videoFile->storeAs('videos/' . $videoDate, $videoNameWithoutSpace);

        // Handle preview image upload
        $previewImageFile = $request->file('preview_image');
        $imageNameWithoutSpace = str_replace(' ', '', $previewImageFile->getClientOriginalName()); // Remove spaces from the original filename

        $previewImagePath = $previewImageFile->storeAs('preview_images/' . $videoDate, $imageNameWithoutSpace);
        $videoNameWithoutExtension = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME); // Get filename without extension

        // Create a new Video instance and save it to the database
        $video = new Video();
        $video->name = $videoNameWithoutExtension; // Use original video name for consistency
        $video->path = $videoPath;
        $video->preview_image_path = $previewImagePath;
        $video->save();

        return response()->json(['message' => 'Video uploaded successfully'], 201);
    }



    public function oldupload(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4|max:1024000', // Adjust max file size as needed
        ]);

        $videoFile = $request->file('video');
        $videoPath = $videoFile->store('videos');
        $videoName = $videoFile->getClientOriginalName(); // Get the original file name

        $video = new Video();
        $video->name = $videoName;
        $video->path = $videoPath;
        $video->save();

        return response()->json(['message' => 'Video uploaded successfully'], 201);
    }


    public function multiupload(Request $request)
    {
        $request->validate([
            'videos.*' => 'required|file|mimes:mp4|max:1024000', // Adjust max file size as needed
        ]);

        $uploadedVideos = [];

        foreach ($request->file('videos') as $videoFile) {
            $videoPath = $videoFile->store('videos');
            $videoName = $videoFile->getClientOriginalName(); // Get the original file name

            $video = new Video();
            $video->name = $videoName;
            $video->path = $videoPath;
            $video->save();

            $uploadedVideos[] = $video;
        }

        return response()->json(['message' => 'Videos uploaded successfully', 'videos' => $uploadedVideos], 201);
    }


    public function show($id)
    {
        $video = Video::find($id);

        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        return response()->json($video);
    }


    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:videos,id', // Validate that the video ID exists in the 'videos' table
        ]);

        $video = Video::findOrFail($request->id); // Find the video by ID

        // Delete the physical video file from storage
        Storage::delete($video->path);

        // Delete the video record from the database
        $video->delete();

        return response()->json(['message' => 'Video deleted successfully'], 200);
    }
}
