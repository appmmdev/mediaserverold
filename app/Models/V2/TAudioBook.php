<?php

namespace App\Models\V2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAudioBook extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'engtitle', 'mmtitle', 'singer', 'timestamp', 'music_img'];
    protected $hidden = [
        // 'id',
        'created_at',
        'updated_at',

    ];
}
