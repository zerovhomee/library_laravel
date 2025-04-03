<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $guarded = false;
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
