<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Level\CreateLevelFeeRequest;
use App\Http\Requests\Level\EditLevelFeeRequest;
use App\Http\Controllers\Controller;
use App\Services\LevelFeeService;
use Session;

class LevelFeeController extends BaseController
{
    private $level_fee;
    public function __construct(LevelFeeService $level_fee){
        $this->authentication();
        $this->level_fee = $level_fee;
    }
    public function getIndex(){
        $data = $this->level_fee->allData();
        return view('level.index-level-fee', compact('data'));
    }
    public function getCreate(){
        return view('level.create-level-fee');
    }
    public function postCreate(CreateLevelFeeRequest $request){
        $input = $request->except('_token');
        $data = $this->level_fee->createLevelFee($input);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil menambahkan level dan biayanya');
        }
        else{
            Session::flash('error-message', 'Terjadi kesalahan dalam menambahkan level dan biayanya');
        }
        return redirect()->action('LevelFeeController@getIndex');
    }
    public function getEdit($id){
        $data = $this->level_fee->getOneLevelFee($id);
        if($data['status'] != 'success'){
            Session::flash('error-message', 'Terjadi kesalahan dalam menambahkan level dan biayanya');
            return redirect()->action('LevelFeeController@getIndex');
        }
        return view('level.edit-level-fee', compact('data'));
    }
    public function postEdit(EditLevelFeeRequest $request, $id){
        $input = $request->except('_token');
        $data = $this->level_fee->updateLevelFee($input, $id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil memperbaharui level dan biayanya');
        }
        else{
            Session::flash('error-message', 'Terjadi kesalahan dalam memperbaharui level dan biayanya');
        }
        return redirect()->action('LevelFeeController@getIndex');
    }
    public function postDelete($id){
        $data = $this->level_fee->deleteLevelFee($id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil menghapus level dan biayanya');
        }
        else{
            Session::flash('error-message', 'Terjadi kesalahan dalam menghapus level dan biayanya');
        }
        return redirect()->action('LevelFeeController@getIndex');
    }
}
