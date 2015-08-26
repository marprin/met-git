<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Kelas\CreateClassRequest;
use App\Http\Requests\Kelas\UpdateClassRequest;
use App\Http\Controllers\Controller;
use App\Services\ClassService;
use Session;

class ClassController extends BaseController
{
    private $class;
    public function __construct(ClassService $class){
        $this->authentication();
        $this->class = $class;
    }
    public function getIndex(){
        $data = $this->class->allClass();
        return view('class.index', compact('data'));
    }
    public function getCreate(){
        return view('class.create');
    }
    public function postCreate(CreateClassRequest $request){
        $input = $request->except('_token');
        $data = $this->class->createClass($input);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Create kelas berhasil dilakukan');
        }
        else{
            Session::flash('error-message', 'Maaf kelas yang anda create tidak berhasil');
        }
        return redirect()->action('ClassController@getIndex');
    }
    public function getEdit($id){
        $data = $this->class->getData($id);
        if($data['status'] != 'success'){
            Session::flash('error-message', 'Maaf kelas yang anda cari tidak ditemukan');
            return redirect('class/index');
        }
        return view('class.edit', compact('data'));
    }
    public function postUpdate(UpdateClassRequest $request, $id){
        $input = $request->except('_token');
        $data = $this->class->updateClass($input, $id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Update kelas berhasil dilakukan');
        }
        else{
            Session::flash('error-message', 'Maaf kelas yang anda cari tidak ditemukan');
        }
        return redirect()->action('ClassController@getIndex');
    }
    public function postDelete($id){
        $data = $this->class->deleteClass($id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Penghapusan kelas berhasil dilakukan');
        }
        else{
            Session::flash('error-message', 'Maaf kelas yang anda hapus tidak ditemukan');
        }
        return redirect()->action('ClassController@getIndex');
    }
}
