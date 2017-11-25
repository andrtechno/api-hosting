<?php

namespace panix\hosting;

use yii\helpers\Json;

class Hosting {

    public $auth_login = 'andrew.panix@gmail.com';
    public $auth_token = '4abtu62s4kdk646ed99437ld3dd3ub9dbdc47v8s7jvpvk4qm4yr8sat9xprb36w';
    protected $response;

    public function __construct($method, $class) {
        $fields = array(
            'auth_login' => $this->auth_login,
            'auth_token' => $this->auth_token,
            'class' => $class,
            'method' => $method,
            'stack' => array('adm.tools')
        );
        $ch = curl_init('https://adm.tools/api.php');
        curl_setopt_array($ch, [
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => Json::encode($fields)
        ]);

        $this->response = curl_exec($ch);
        curl_close($ch);
    }

}
