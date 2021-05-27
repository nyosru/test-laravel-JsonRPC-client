<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RpcController extends Controller
{

    const JSON_RPC_VERSION = '2.0';

    /**
     * формируем массив для запроса к серверу
     */
    public static function request(string $method, array $params = [], int $id = null)
    {

        $r = [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'method'  => $method,
            'params'  => $params,
        ];

        if (!empty($id))
            $r['id'] = $id;

        return $r;

    }

}
