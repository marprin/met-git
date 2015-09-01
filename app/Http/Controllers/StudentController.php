<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\RegisterStudentRequest;
use App\Http\Requests\Student\EditStudentDataRequest;
use App\Services\StudentService;
use Session;

class StudentController extends BaseController{
    private $student;
    public function __construct(StudentService $student){
        $this->authentication();
        $this->middleware('receptionist', ['only' => ['']]);
        $this->student = $student;
    }
    public function getIndex(){
        $data = $this->student->getAllStudentData();
        return view('student.index', compact('data'));
    }
    public function getRegistration(){
        return view('student.registration');
    }
    public function postCreate(RegisterStudentRequest $request){
        $input = $request->all();
        $data = $this->student->registerStudent($input);
        if(\Input::get('simpan')){
            return redirect()->action('StudentController@getIndex');
        }
        else{
            return redirect()->action("PaymentController@getPayment", $input['student_id'], 'student-registration');
        }
    }
    public function getEdit($id){
        $data = $this->student->getStudentData($id);
        if($data['status'] == 'success') {
            return view('student.edit', compact('data'));
        }
        Session::flash('error-message', 'Tidak ditemukan murid dengan id yang dipilih');
        return redirect()->back();
    }
    public function postEdit(EditStudentDataRequest $request, $id){
        $input = $request->except('_token');
        $data = $this->student->editStudent($input, $id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil mengubah data murid');
        }
        else{
            Session::flash('error-message', 'Gagal mengubah data murid');
        }
        return redirect('student');
    }
    public function postDelete($id){
        $data = $this->student->deleteStudent($id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil menghapus data murid');
        }
        else{
            Session::flash('error-message', 'Gagal menghapus data murid');
        }
        return redirect('student');
    }
    public function postSearchStudentById(Request $request){
        $input = $request->all();
        $data = $this->student->getStudentData($input['student_id']);
        if($data['status'] == 'success'){
            return view('student.edit', compact('data'));
        }
        Session::flash('error-message', 'Data murid tidak ditemukan');
        return redirect()->back();
    }
}
