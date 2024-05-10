<?php

namespace App\Http\Controllers\V2;

use App\Http\Resources\V2\TAudiobookCollection;
use App\Models\V2\TAudioBook;
use Illuminate\Http\Request;

class TAudioBookController extends Controller
{
    public function create(Request $request)
    {


        $data = new TAudioBook();

        $data->path = $request->path;
        $data->engtitle = $request->engtitle;
        $data->mmtitle = $request->mmtitle;
        $data->singer = $request->singer;
        $data->timestamp = $request->timestamp;
        $data->music_img = $request->music_img;





        $data->save();

        return $data->id;
    }

    public function show()
    {
        return new TAudiobookCollection(TAudioBook::all());
    }

    public function latestaudiobook()
    {

        $data = TAudioBook::latest()->paginate(10);

        return new TAudioBookCollection($data);
    }
}
