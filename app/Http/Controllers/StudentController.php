<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\RegisterStudentRequest;
use App\Services\StudentService;

class StudentController extends BaseController
{
    private $student;
    public function __construct(StudentService $student)
    {
        $this->authentication();
        $this->middleware('receptionist', ['only' => ['getRegistration', 'postCreate', 'getEdit']]);
        $this->student = $student;
    }
    public function getIndex()
    {
        return 0;
    }
    public function getRegistration()
    {
        return view('student.registration');
    }
    public function postCreate(RegisterStudentRequest $request)
    {
        $input = $request->all();
        $data = $this->student->registerStudent($input);
        return redirect()->action('StudentController@getIndex');
    }
    public function getEdit($id)
    {
        $data = $this->student->getStudentData($id);
        if($data['status'] == 'success')
        {

        }
        return 0;
    }
}
