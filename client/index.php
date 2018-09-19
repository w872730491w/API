<?php
    include './vendor/autoload.php';

    $url = 'http://localhost/api/server/index.php';
    $data = [];

    $curl = new Curl\Curl();
    $curl->post($url, $data);

    if($curl->error){
        echo $curl->error_code;
    } else {
        echo $curl->response;
    }
