<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\BookService;

class BookController extends BaseController{
    private $book;
    public function __construct(BookService $book){
        $this->book = $book;
    }
}
