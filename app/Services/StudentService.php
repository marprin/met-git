<?php namespace App\Services;

use App\Models\Student;
class StudentService
{
    private $api = array();

    private $status_failed = 'failed';
    private $status_success = 'success';
    private $message_failed = 'Something went wrong';
    private $message_success = 'The process is succeed';

    public function __construct()
    {
        $this->api['message'] = $this->message_failed;
        $this->api['result'] = null;
        $this->api['status'] = $this->status_failed;
    }
    public function registerStudent(array $data)
    {
        $arranged_data = [
            'student_id' => $data['student_id'],
            'name' => $data['student_name'],
            'address' => $data['address'],
            'birthday' => $data['birthday'],
            'still_on_course' => 'Yes'
        ];

        $create = Student::create($arranged_data);
        if($create)
        {
            $this->api['message'] = $this->message_success;
            $this->api['status'] = $this->status_success;
        }
        return $this->api;
    }
}