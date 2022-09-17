<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Expose-Headers: Content-Length, X-JSON");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Accept-Language, X-Authorization");
header('Access-Control-Max-Age: 86400');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    return;
}
connect();
function connect()
{
    //$db = new PDO("mysql:host=localhost;dbname=wp_xxc3f", "Admin_elternrat", "Uitikon20**");
    $dbhost = DB_HOST;
    $dbname = DB_NAME;
    $dbuser = DB_USER;
    $dbpass = DB_PASSWORD;
    $db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname . '', '' . $dbuser . '', '' . $dbpass . '');
    return $db;
}
if (!function_exists('parameters')) {
    function parameters()
    {
        $body = file_get_contents('php://input');
        if (empty($body)) {
            return [];
        }
        $data = json_decode($body, TRUE);
        if (json_last_error()) {
            return [];
        }
        return $data;
    }
}
$params = parameters();
if (!$params) {
    connect();
}
if (!function_exists('result')) {
    function result(array $res)
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
        exit;
    }
}
