<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table='albums';
    protected $fillable=['nama_album','deskripsi_album'];

    public function images(){
        return $this->hasMany(Images::class);
    }
}
