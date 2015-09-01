<?php namespace App\Services;

use App\Models\Payment;
class PaymentService{
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
    public function savePayment(array $data){
        $create = Payment::create($data);
        if($create){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
        }
        return $this->api;
    }
}