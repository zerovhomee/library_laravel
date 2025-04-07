<?php

namespace App\Http\Controllers\BookSearch;



use App\Http\Controllers\Controller;
use App\Services\BookSearch\Service;

class BaseController extends Controller
{
    public $bookService;
    public function __construct(Service $service){
        $this->bookService = $service;
    }
}
