<?php

namespace App\Http\Controllers\BookSearch;

use App\Http\Controllers\Controller;
use App\Services\BookSearch\Service;

class ResultController extends BaseController
{
    public function searchAndSaveBooks($query)
    {

        $googleBooks = $this->bookService->searchBooks($query);

        foreach ($googleBooks as $book) {
            $this->bookService->saveBook($book['title'], $book['description']);
        }

        $mannBooks = $this->bookService->searchBooksMann($query);

        foreach ($mannBooks as $book) {
            $this->bookService->saveBook($book['title'], $book['url']);
        }

        return response()->json([
            'google_books' => $googleBooks,
            'mann_books' => $mannBooks
        ]);
    }
}
