<?php

namespace App\Services\BookSearch;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Service
{
    public function saveBook($name, $text, $userId)
    {

        $book = Book::firstOrCreate(
            ['name' => $name, 'user_id' => $userId],
            ['text' => $text]
        );

        return $book;
    }

    public function searchBooks($query)
    {
        $url = 'https://www.googleapis.com/books/v1/volumes?q=' . urlencode($query);

        $response = Http::get($url);


        if ($response->successful()) {
            $books = $response->json()['items'] ?? [];


            return collect($books)->map(function ($book) {
                return [
                    'title' => $book['volumeInfo']['title'] ?? 'Без названия',
                    'authors' => $book['volumeInfo']['authors'] ?? [],
                    'description' => $book['volumeInfo']['description'] ?? 'Описание не доступно',
                    'url' => $book['volumeInfo']['infoLink'] ?? '',
                    'uuid' => $book['id'] ?? null,
                ];
            });
        }

        return [];
    }

    public function searchBooksMann($query)
    {
        $url = 'https://www.mann-ivanov-ferber.ru/book/search.ajax?q=' . urlencode($query);


        $response = Http::get($url);


        if ($response->successful()) {
            $books = $response->json();

            return collect($books)->map(function ($book) {
                return [
                    'title' => $book['title'] ?? 'Без названия',
                    'url' => $book['url'] ?? '',
                ];
            });
        }

        return [];
    }
}

