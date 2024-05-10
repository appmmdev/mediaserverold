<?php

namespace App\Http\Controllers\V2;

use App\Http\Resources\V2\TPostCollection;
use App\Models\V2\TPost;
use Illuminate\Http\Request;

class TPostController extends Controller
{

    public function create(Request $request)
    {


        $postdata = new TPost();
        $postdata->mmtitle = $request->mmtitle;
        $postdata->engtitle = $request->engtitle;
        $postdata->author = $request->author;
        $postdata->source = $request->source;
        $postdata->timeStamp = $request->timeStamp;
        $postdata->mmcontent = $request->mmcontent;
        $postdata->engcontent = $request->engcontent;
        $postdata->image = $request->image;




        $postdata->save();

        return $postdata->id;
    }





    public function limitposts()


    {

        $data = TPost::latest()->paginate(5);

        return new TPostCollection($data, 200);
    }





    public function showbyId($id)
    {

        $postdata = TPost::find($id);
        return response()->json([$postdata], 200);
    }

    public function update(Request $request, $id)
    {

        $postdata = TPost::find($id);
        $postdata->mmtitle = $request->mmtitle;
        $postdata->engtitle = $request->engtitle;
        $postdata->author = $request->author;
        $postdata->source = $request->source;
        $postdata->timeStamp = $request->timeStamp;
        $postdata->mmcontent = $request->mmcontent;
        $postdata->engcontent = $request->engcontent;
        $postdata->image = $request->image;
        $postdata->save();
        return response()->json([$postdata], 200);
    }

    public function updateviewcount(Request $request)
    {
        $postId = $request->input('post_id');

        $postdata = TPost::find($postId);
        $viewcount = $postdata['viewcount'];
        $postdata->viewcount = $viewcount + 1;



        $postdata->save();
        return response()->json($postdata);
    }




    public function delete($id)
    {

        $postdata = TPost::find($id);
        $postdata->delete();

        return response()->json($postdata);
    }
}
