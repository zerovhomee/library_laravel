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
            'text'=>'nullable',
            'text_file' => 'nullable|file|mimes:txt|max:2048',
        ]);

        if (request()->hasFile('text_file')) {
            $file = request()->file('text_file');
            $text = file_get_contents($file->getRealPath());
            $data['text'] = $text;
        }

        $data_to_store = [];
        $data_to_store['name'] = $data['name'];
        $data_to_store['text'] = $data['text'];
        $data_to_store += ['user_id' => Auth::id()];

        Book::create($data_to_store);
        return redirect()->route('books.index');
    }
}
