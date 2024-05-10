<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'preview_image_path'];

    protected $hidden = [
        // 'id',

        // 'created_at',
        // 'updated_at',

    ];
}
