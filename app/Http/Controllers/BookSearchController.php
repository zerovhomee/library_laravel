<?php

namespace App\Http\Controllers;

use App\Services\BookService;

class BookSearchController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

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
