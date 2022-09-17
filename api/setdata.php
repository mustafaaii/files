<?php
require_once("../function.php");
$db = connect();
if (!empty($params)) {
    $db = connect();


    if ($params["status"] === "set_log") {
        $log_text     = $params["text"];
        $log_stat     = $params["stat"];

        $log_date     = date("Y-m-d");
        $sql = "INSERT INTO wp_log_list (log_text, log_stat, log_date) VALUES (:log_text, :log_stat, :log_date)";
        $res = $db->prepare($sql);
        $exec = $res->execute(array(":log_text"  => $log_text, ":log_stat"  => $log_stat,  ":log_date"  => $log_date,));
    }

    if ($params["status"] === "set_file") {
        $name     = $params["name"];
        $cid      = $params["cid"];
        $cate     = $params["cate"];
        $type     = $params["type"];
        $size     = $params["size"];
        $date     = date("Y-m-d");
        $byer     = $params["byer"];
        $urls     = $params["urls"];
        $pass     = $params["pass"];

        $sql = "INSERT INTO wp_file_table (filenames, category, cid, filetype, filesize, filedate, byname, byid, fileurl) VALUES (:filenames, :category, :cid, :filetype, :filesize, :filedate, :byname, :byid, :fileurl)";
        $res = $db->prepare($sql);
        $exec = $res->execute(
            array(
                ":filenames" => $name,
                ":category"  => $cate,
                ":cid"       => $cid,
                ":filetype"  => $type,
                ":filesize"  => $size,
                ":filedate"  => $date,
                ":byname"    => $byer,
                ":byid"      => $pass,
                ":fileurl"   => $urls,
            )
        );
        echo 1;
    }

    if ($params["status"] === "set_category") {
        $name  = $params["name"];
        $text  = $params["text"];
        $auth  = $params["auth"];
        $date  = date("Y-m-d");
        $null = "Not updated";
        $sql = "INSERT INTO wp_file_category (category, category_auth, category_create_date, category_update_date, category_text) VALUES (:category, :category_auth, :category_create_date, :category_update_date, :category_text)";
        $res = $db->prepare($sql);
        $exec = $res->execute(array(":category" => $name, ":category_auth" => $auth, ":category_create_date" => $date, ":category_update_date" => $null, ":category_text" => $text));
        echo 1;
    }

    if ($params["status"] === "upt_category") {
        $name  = $params["name"];
        $text  = $params["text"];
        $id    = $params["id"];
        $date  = date("Y-m-d");
        $sql = "UPDATE  wp_file_category SET category=:category, category_text=:category_text, category_update_date=:category_update_date WHERE id=:id";
        $res = $db->prepare($sql);
        $exec = $res->execute(array(":category" => $name, ":category_text" => $text, ":category_update_date" => $date, ":id" => $id));
        echo 1;
    }
} else {
    $filename = $_FILES['fileupload']['name'];
    $location = "../upload/" . uniqid() . $filename;
    if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $location)) {
        echo $location;
    } else {
        echo '2';
    }
}
