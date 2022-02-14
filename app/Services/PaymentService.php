<?php

namespace App\Services;


use Illuminate\Http\Request;

class PaymentService
{
    public static function getData(Request $request): string
    {
        if ($request->get('amount')) {
            $amount = $request->get('amount');
        } else {
            $amount = 1;
        }

        $json = json_encode([
            'public_key' => config('liqpay.public_key'),
            'version' => '3',
            'action' => 'pay',
            'amount' => $amount,
            'currency' => 'UAH',
            'description' => 'test',
            'result_url' => 'http://bosskokos',

        ]);

        return base64_encode($json);
    }

    public static function getSignature(Request $request): string
    {
        $str = (config('liqpay.private_key').self::getData($request).config('liqpay.private_key'));

        return base64_encode(sha1($str, 1));
    }

}

