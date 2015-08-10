<?php

namespace App\Services;

use App\Models\Teacher;

class TeacherService {
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
    public function allTeacher(){
        $all = Teacher::all();
        if($all != '[]'){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $all;
        }
        return $this->api;
    }
    public function createTeacherData(array $data){
        $create = Teacher::create($data);
        if($create){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
        }
        return $this->api;
    }
    public function getTeacherData($id){
        $find = Teacher::whereTeacherId($id)->first();
        if(!is_null($find)){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $find;
        }
        return $this->api;
    }
    public function updateTeacherData(array $data, $id){
        $find = Teacher::whereTeacherId($id);
        if(!is_null($find->first())){
            $update = $find->update($data);
            if($update){
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
    public function deleteTeacherData($id){
        $find = Teacher::whereTeacherId($id);
        if(!is_null($find->first())){
            $delete = $find->delete();
            if($delete){
                $this->api['status'] = $this->message_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
} 