<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Book $book){
        $book->delete();
        return redirect()->route('books.trash', compact('book'));
    }
}
