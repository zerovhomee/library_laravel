<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore();
        return redirect()->route('books.index');
    }
}

