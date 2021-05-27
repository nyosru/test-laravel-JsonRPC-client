<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RpcController;
use GuzzleHttp\Client;

class UserController extends Controller
{

    public function show(int $user)
    {

        $post_data = RpcController::request('get_balance', ['user_id' => $user], 1);

        // dd( $post_data ) ;

        $client = new Client();
        $res = $client->request('POST', 'http://api1balance.php-cat.com/api/datain', ['form_params' => $post_data]);

        // dd( $res ) ;
        // dd( $res->getBody() ) ;

        // $result = json_decode($res->getBody(), true );
        $result = json_decode($res->getBody(), true);
        // dd($result);

        return view('welcome', ['result' => $result['error'] ?? $result['result'] ?? '-']);
    }

}
