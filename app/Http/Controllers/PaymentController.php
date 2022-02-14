<?php

namespace App\Http\Controllers;



use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function create(Request $request)
    {
        $data = PaymentService::getData($request);

        $signature = PaymentService::getSignature($request);

        return view('site.payments.create',compact('data', 'signature'));
    }

}
