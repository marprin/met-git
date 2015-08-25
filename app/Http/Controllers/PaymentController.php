<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\PaymentService;

class PaymentController extends BaseController
{
    private $payment;
    /*public function __construct(PaymentService payment){
        $this->authentication();
        $this->middleware('auth');
        $this->payment = payment;
    }*/
}
