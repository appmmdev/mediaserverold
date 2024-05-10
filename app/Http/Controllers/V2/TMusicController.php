<?php

namespace App\Http\Controllers\V2;

use App\Http\Resources\V2\TMusicCollection;
use App\Models\V2\TMusic;
use Illuminate\Http\Request;

class TMusicController extends Controller
{
    public function create(Request $request)
    {


        $data = new TMusic();

        $data->path = $request->path;
        $data->engtitle = $request->engtitle;
        $data->mmtitle = $request->mmtitle;
        $data->singer = $request->singer;
        $data->timestamp = $request->timestamp;
        $data->music_img = $request->music_img;





        $data->save();
        //  return response()->json($data);
        return $data->id;
    }

    public function show()
    {
        return new TMusicCollection(TMusic::all());
    }


    public function latestmusic()


    {

        $data = TMusic::latest()->paginate(10);



        // return new AudioBookCollection($data);
        // return response()->json($data, 200);
        return new TMusicCollection($data);
    }
}
