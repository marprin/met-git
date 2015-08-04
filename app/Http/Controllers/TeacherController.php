<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\TeacherService;

class TeacherController extends BaseController {
    private $teacher;
    public function __construct(TeacherService $teacher){
        $this->teacher = $teacher;
    }
    public function getIndex(){
        $data = $this->teacher->allTeacher();
        return view('teacher.index', compact('data'));
    }
}
