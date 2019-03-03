<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albumimage extends Model
{
    public function album(){
        return $this->belongsTo(Album::class);
      }
}
