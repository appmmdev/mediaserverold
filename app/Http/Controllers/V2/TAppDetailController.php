<?php

namespace App\Http\Controllers\V2;

use App\Http\Resources\V2\TAppDetailCollection;
use App\Models\V2\TAppDetail;
use Illuminate\Http\Request;

class TAppDetailController extends Controller
{
      public function show()
  {
    return new TAppDetailCollection(TAppDetail::all());
  }
}

