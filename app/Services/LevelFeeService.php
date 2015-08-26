<?php

namespace App\Services;
use App\Models\LevelFee;

class LevelFeeService {
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
    public function allData(){
        $all = LevelFee::all();
        if($all != '[]'){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $all;
        }
        return $this->api;
    }
    public function createLevelFee(array $data){
        $create = LevelFee::create($data);
        if($create){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
        }
        return $this->api;
    }
    public function getOneLevelFee($id){
        $find = LevelFee::find($id);
        if(!is_null($find)){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $find;
        }
        return $this->api;
    }
    public function updateLevelFee(array $data, $id){
        $find = LevelFee::find($id);
        if(!is_null($find)){
            $update = $find->update($data);
            if($update){
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
    public function deleteLevelFee($id){
        $find = LevelFee::find($id);
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