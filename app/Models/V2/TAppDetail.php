<?php

namespace App\Models\V2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAppDetail extends Model
{
  use HasFactory;

  protected $fillable = ['appversion', 'updatemessage','iosappversion', 'iosupdatemessage'];
  protected $hidden = [
    // 'id',
    'created_at',
    'updated_at',

  ];
}
