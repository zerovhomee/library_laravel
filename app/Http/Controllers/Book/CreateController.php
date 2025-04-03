<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(){
        return view('book.create');
    }
}
