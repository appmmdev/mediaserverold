<?php

namespace App\Models\V2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPost extends Model
{
    use HasFactory;
    protected $fillable = ['mmtitle', 'engtitle', 'author', 'source', 'timeStamp', 'mmcontent', 'engcontent', 'image'];

    protected $hidden = [
        // 'id',
        'created_at',
        'updated_at',

    ];
    public function tlikes()
    {

        return $this->hasMany(Tlike::class);
    }

    public function tcomments()
    {

        return $this->hasMany(Tcomment::class);
    }
}
