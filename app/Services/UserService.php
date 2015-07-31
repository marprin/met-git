<?php namespace App\Services;

use App\User;
use Auth;
use Session;
class UserService
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
    public function login(array $input, $remember, $auth)
    {
        $input['confirm'] = 1;
        if(auth->attempt($input, $remember))
        {

            return true;
        }
        else
        {
            return false;
        }
        return false;
    }
} 