<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function __invoke()
    {
        $books = Book::onlyTrashed()->get()->where('user_id', auth()->id());
        return view('book.restore', compact('books'));
    }
}

