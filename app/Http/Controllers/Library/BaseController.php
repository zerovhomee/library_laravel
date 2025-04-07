<?php

namespace App\Http\Controllers\Library;



use App\Http\Controllers\Controller;
use App\Services\LibraryAccess\Service;

class BaseController extends Controller
{
    public $service;
    public function __construct(Service $service){
        $this->service = $service;
    }
}
