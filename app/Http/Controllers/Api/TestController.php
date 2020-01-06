<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;

Class TestController extends Controller
{
    public function test()
    {
//        echo date('Y-m-d H:i:s');

        $user_info = [
            'uid' => 123,
            'name' => 'lisi',
            'email' => 'lisi@qq.com',
            'age' => 12
        ];

        $response = [
            'errno' => 0,
            'msg' => 'ok',
            'data' => [
                'user_info' => $user_info
            ]
        ];

        echo json_encode($user_info);
    }

//    用户注册
    public function reg(Request $request)
    {
        echo '<pre>';print_r($request->input());echo '<pre>';

        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        if ($pass1 != $pass2){
            die('两次输入的密码不一致');
        }

        $password = password_hash($pass1,PASSWORD_BCRYPT);
        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => $password,
            'last_login' => time(),
            'last_ip' => $_SERVER['REMOTE_ADDR'], // 获取远程ip
        ];

        $uid = UserModel::insertGetId($data);
		var_dump($uid);
        if ($uid){
            echo '注册失败';
        }
    }
}
