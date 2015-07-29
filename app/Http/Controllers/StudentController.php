<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function __construct()
    {

    }
    public function getIndex()
    {
        return view('student.registration', ['name' => 'ma']);
    }
    public function postCreate()
    {

    }
}
