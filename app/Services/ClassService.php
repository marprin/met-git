<?php

namespace App\Services;
use App\Models\Kelas;


class ClassService {
    private $api = array();

    private $status_failed = 'failed';
    private $status_success = 'success';
    private $message_failed = 'something went wrong';
    private $message_success = 'the process is succeed';

    public function __construct(){
        $this->api['message'] = $this->message_failed;
        $this->api['result'] = null;
        $this->api['status'] = $this->status_failed;
    }
    public function allClass(){
        $all = Kelas::all();
        if($all != '[]'){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $all;
        }
        return $this->api;
    }
    public function createClass(array $data){
        $create = Kelas::create($data);
        if($create){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
        }
        return $this->api;
    }
    public function getData($id){
        $find = Kelas::find($id);
        if(!is_null($find)){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $find;
        }
        return $this->api;
    }
    public function updateClass(array $data, $id){
        $find = Kelas::find($id);
        if(!is_null($find)){
            $update = $find->update($data);
            if($update){
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
    public function deleteClass($id){
        $find = Kelas::find($id);
        if(!is_null($find)){
            $delete = $find->delete();
            if($delete){
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
}