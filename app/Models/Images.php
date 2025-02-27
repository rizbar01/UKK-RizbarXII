<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $table = 'images';
    protected $fillable = ['name', 'image', 'description', 'album_id'];

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
