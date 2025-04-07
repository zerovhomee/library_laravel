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
            'name'=>'required',
            'text'=>'nullable',
            'text_file' => 'nullable|file|mimes:txt|max:2048',

        ]);

        if (request()->hasFile('text_file')) {
            $file = request()->file('text_file');
            $text = file_get_contents($file->getRealPath());
            $data['text'] = $text;
        }

        $data_to_update = [];
        $data_to_update['name'] = $data['name'];
        $data_to_update['text'] = $data['text'];
        $data_to_update += ['user_id' => Auth::id()];

        $book -> update($data_to_update);
        return response()->json(['Успешно']);
    }
}
