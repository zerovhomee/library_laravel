<?php

namespace App\Services\Book;

use App\Models\Book;

class Service
{
    public function store($data){
        Book::create($data);
    }

    public function update($book, $data){
        $book -> update($data);
    }
}
