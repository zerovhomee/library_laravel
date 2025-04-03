<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(){
        $data = request()->validate([
            'name'=>'required',
            'text'=>'required',
        ]);
        $data += ['user_id' => Auth::id()];
        Book::create($data);
        return redirect()->route('books.index');
    }
}
