<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\TeacherService;
use App\Http\Requests\Teacher\CreateTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use Session;

class TeacherController extends BaseController {
    private $teacher;
    public function __construct(TeacherService $teacher){
        $this->teacher = $teacher;
    }
    public function getIndex(){
        $data = $this->teacher->allTeacher();
        return view('teacher.index', compact('data'));
    }
    public function getCreate(){
        return view('teacher.create');
    }
    public function postCreate(CreateTeacherRequest $request){
        $input = $request->except('_token');
        return redirect()->action('TeacherController@getIndex');
    }
    public function getEdit($id){
        $data = $this->teacher->getTeacherData($id);
        if($data['status'] != 'success'){
            Session::flash('error-message', 'Maaf data yang anda cari tidak ditemukan');
            return redirect()->back();
        }
        return view('teacher.edit', compact('data'));
    }
    public function postEdit(UpdateTeacherRequest $request, $id){
        $input = $request->except('_token');
        $data = $this->teacher->updateTeacherData($input, $id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil memperbaharui data teacher');
            return redirect()->action('TeacherController@getIndex');
        }
        else{
            Session::flash('error-message', 'Maaf terjadi kesalahan');
            return redirect()->back();
        }
    }
    public function postDelete($id){
        $data = $this->teacher->deleteTeacherData($id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil menghapus data teacher');
        }
        else{
            Session::flash('error-message', 'Maaf, gagal menghapus data teacher');
        }
        return redirect()->action('TeacherController@getIndex');
    }
}
