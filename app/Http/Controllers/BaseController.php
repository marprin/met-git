<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class BaseController extends Controller
{
    public function __construct()
    {}
    public function authentication()
    {
        if(Auth::guest())
        {
            header('Location:'.action('Auth\AuthController@getLogin')); exit();
        }
    }
}
