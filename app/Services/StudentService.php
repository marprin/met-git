<?php namespace App\Services;

use App\Models\Student;
class StudentService{
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
    public function getAllStudentData(){
        $get = Student::all();
        if($get != '[]') {
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $get;
        }
        return $this->api;
    }
    public function registerStudent(array $data){
        $arranged_data = [
            'student_id' => $data['student_id'],
            'name' => $data['student_name'],
            'address' => $data['address'],
            'birthday' => $data['birthday'],
            'still_on_course' => 'Yes'
        ];

        $create = Student::create($arranged_data);
        if($create) {
            $this->api['message'] = $this->message_success;
            $this->api['status'] = $this->status_success;
        }
        return $this->api;
    }
    public function getStudentData($id){
        $find = Student::whereStudentId($id);
        if(!is_null($find->first())) {
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $find->first();
        }
        return $this->api;
    }
    public function editStudent(array $data, $id){
        $find = Student::whereStudentId($id);
        if(!is_null($find->first())) {
            $update = $find->update($data);
            if($update) {
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
    public function deleteStudent($id){
        $delete = Student::whereStudentId($id);
        if(!is_null($delete->first())) {
            if($delete->delete()) {
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
}