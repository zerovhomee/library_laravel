<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();

        if ($request->hasFile('text_file')) {
            $file = $request->file('text_file');
            $text = file_get_contents($file->getRealPath());
            $data['text'] = $text;
        }
        unset($data['text_file']);

        $data += ['user_id' => Auth::id()];

        $this->service->store($data);
        return $data;
    }
}
