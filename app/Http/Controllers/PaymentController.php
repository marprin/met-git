<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use App\Services\StudentService;
use App\Services\LevelFeeService;

class PaymentController extends BaseController
{
    private $payment;
    public function __construct(PaymentService $payment){
        $this->authentication();
        $this->middleware('auth');
        $this->payment = $payment;
    }
    public function getIndex(){

    }
    public function getPayment($id, StudentService $student, LevelFeeService $fee, $status = null){
    	$student_data = $student->getStudentData($id)['result'];
    	$fee_data = $fee->allData()['result'];
        return view('payment.pay-student-fee', compact('id', 'student_data', 'fee_data', 'status'));
    }
    public function postPayment(Request $request){
        $input = $request->all();
        dd($input);
        $payment = $this->payment->savePayment($input);
        if(\Input::get('saveandcontinuetoclass')){
            return redirect()->action('');
        }
        return redirect()->action('PaymentController@getIndex');
    }
}
