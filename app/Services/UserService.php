<?php namespace App\Services;

use App\User;
use Auth;
use Session;
class UserService{
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
    public function getAllUserData(){
        $all = User::all();
        if(isset($all)) {
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $all;
        }
        return $this->api;
    }
    public function login(array $input, $remember, $auth){
        $input['confirmed'] = 1;
        if(auth()->attempt($input, $remember)) {
            Session::put('role', Auth::user()->role);
            return true;
        }
        else {
            return false;
        }
        return false;
    }
    public function register(array $data){
        $register = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'role' => null,
            'confirmed' => 0,
            'password' => bcrypt($data['password']),
        ]);
        if($register) {
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
        }
        return $this->api;
    }
    public function editUser(array $data, $id){
        $decode_id = decode($id);
        $find = User::find($decode_id);
        if(!is_null($find)) {
            $update= $find->update($data);
            if($update) {
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
    public function getUserData($id){
        $decoded_id = decode($id);
        $find = User::find($decoded_id);
        if(!is_null($find)) {
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = [
                'id' => $id,
                'name' => $find->name,
                'username' => $find->username,
                'email' => $find->email,
                'role' => $find->role,
                'confirmed' => $find->confirmed
            ];
        }
        return $this->api;
    }
    public function deleteUser($id){
        $decoded_id = decode($id);
        $find = User::find($id);
        if(!is_null($find)){
            if($find->delete()){
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
} 