<?php
    define('HOST', 'localhost');
    define('DB', 'api');
    define('CHARSET', 'utf8');
    define('USER', 'root');
    define('PASS', '');

    try {
        $pdo = new PDO('mysql:host='.HOST.';dbname='.DB.';charset='.CHARSET, USER, PASS);

        $stmt = $pdo->query('select * from user');

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        response($data, 200, '返回数据成功');
    } catch (\Exception $e) {
        response([], 401, $e->getMessage());
    }


    /**
     * 发送API标准格式数据
     * @param  Array  $data    返回的数据
     * @param  Int    $status  状态码
     * @param  String $message 返回的信息
     * @return void
     */
    function response(array $data, Int $status, String $message)
    {
        $response = [
            'data'=> $data,
            'status'=> $status,
            'message'=> $message
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
