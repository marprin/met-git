<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends BaseController
{
    public function __construct()
    {

    }
    public function getIndex()
    {
        return view('home');
    }
}
