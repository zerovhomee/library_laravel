<?php

namespace App\Services\LibraryAccess;

use App\Models\Book;
use App\Models\LibraryAccess;

class Service
{
    public function store($data){
        LibraryAccess::create($data);
    }

}
