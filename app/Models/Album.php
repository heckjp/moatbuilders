<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable= ['artist_id','name','year','artist_id'];

    public function artist(){
       return $this->belongsTo(Artist::class,'artist_id');
    }
}
