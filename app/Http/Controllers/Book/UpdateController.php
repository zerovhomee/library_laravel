<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Book $book){
        $data = $request->all();


        if ($request->hasFile('text_file')) {
            $file = $request->file('text_file');
            $text = file_get_contents($file->getRealPath());
            $data['text'] = $text;
        }
        unset($data['text_file']);

        $data += ['user_id' => Auth::id()];

        $this->service->update($book, $data);

        return response()->json(['Успешно']);

    }
}
