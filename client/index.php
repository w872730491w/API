<?php
    include 'vendor/autoload.php';
    include 'aes.php';

    /**
     * 加密签名
     * @param  String $token 要加密的字符串
     * @return String $sing  返回被加密的字符串
     */
    function setsing(String $token)
    {
        $sing = Aes::encrypt($token, 'abcdef1234567890');
        return $sing;
    }

    //定义秘钥
    define('Token', 'test');

    $url = 'http://localhost/api/server/index.php';
    $data = [
        'sing'=> setsing(Token)
    ];

    $curl = new Curl\Curl();
    $curl->post($url, $data);

    if ($curl->error) {
        echo $curl->error_code;
    } else {
        echo $curl->response;
    }
