<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PingController extends Controller
{
    //

    public function pay(){

        \Pingpp\Pingpp::setApiKey(env('PING_API_KEY'));

        \Pingpp\Pingpp::setPrivateKeyPath(public_path() . '/private_key.pem');

        $charge =  \Pingpp\Charge::create([
            'order_no'  => time().'123456789',
            'amount'    => '100',//订单总金额, 人民币单位：分（如订单总金额为 1 元，此处请填 100）
            'app'       => ['id' => env('PING_APP_ID')],
            'channel'   => 'alipay_pc_direct',
            'currency'  => 'cny',
            'client_ip' => '127.0.0.1',
            'subject'   => '1_32',
            'body'      => 'Your Body',
            'extra'     => ['success_url' => 'local.ping.com/paysuccess']
        ]);

        dd($charge);
        return view('pay.pay',['charge'=>$charge]);
    }

    public function paysuccess(){

        dd('success');
    }
}
