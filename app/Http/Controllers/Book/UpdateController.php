<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __invoke(Book $book){
        $data = request()->validate([
            'title'=>'required',
            'text'=>'required',

        ]);
        $book -> update($data);
        return redirect()->route('books.show', $book->id);
    }
}
