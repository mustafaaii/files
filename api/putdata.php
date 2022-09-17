<?php
require_once("../function.php");
$db = connect();

if ($params["status"] === "put_category") {
    $id  = $params["id"];
    $sql = "DELETE FROM wp_file_category WHERE id=:id";
    $res = $db->prepare($sql);
    $exec = $res->execute(array("id" => $id,));
    echo 1;
}

if ($params["status"] === "put_file") {

    $id  = $params["id"];
    $url  = $params["urls"];
    unlink("../" . $url);
    $id  = $params["id"];
    $sql = "DELETE FROM wp_file_list WHERE id=:id";
    $res = $db->prepare($sql);
    $exec = $res->execute(array("id" => $id,));
    echo 1;
}

