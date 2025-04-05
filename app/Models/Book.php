<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'books';
    protected $guarded = false;
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function sharedUsers()
    {
        return $this->belongsToMany(User::class, 'book_accesses')
            ->withPivot('permission')
            ->withTimestamps();
    }
}
