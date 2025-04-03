<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Book $book){
        return view('book.show', compact('book'));
    }
}
