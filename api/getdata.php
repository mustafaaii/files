
<?php
require_once("../function.php");
$db = connect();


if ($params["status"] === "get_list") {
    try {
        $sorgu = $db->query("SELECT * FROM wp_file_list");
        if ($table = $sorgu->fetchAll()) {
            $db = NULL;
            $table = array_values(array_map(function ($item) {
                return [
                    "id"            => $item["id"],
                    "filename"      => $item["filename"],
                    "cate_name"     => $item["cate_name"],
                    "cate_id"       => $item["cate_id"],
                    "filetype"      => $item["filetype"],
                    "filesize"      => $item["filesize"],
                    "filedate"      => $item["filedate"],
                    "byname"        => $item["byname"],
                    "byid"          => $item["byid"],
                    "fileurl"       => $item["fileurl"],
                ];
            }, $table));
            result([
                "status" => TRUE,
                "data"   => $table
            ]);
        }
        $db = NULL;
        result([
            "status"  => FALSE,
            "message" => "Veri Bulunamadı."
        ]);
    } catch (\Exception $e) {
        result([
            "status"  => FALSE,
            "message" => $e->getMessage()
        ]);
    }
}

if ($params["status"] === "get_log") {
    try {
        $sorgu = $db->query("SELECT * FROM wp_log_list ORDER BY id DESC");
        if ($table = $sorgu->fetchAll()) {
            $db = NULL;
            $table = array_values(array_map(function ($item) {
                return [
                    "id" => $item["id"],
                    "text" => $item["log_text"],
                    "stat" => $item["log_stat"],
                    "date" => $item["log_date"],
                ];
            }, $table));
            result([
                "status" => TRUE,
                "data"   => $table
            ]);
        }
        $db = NULL;
        result([
            "status"  => FALSE,
            "message" => "Veri Bulunamadı."
        ]);
    } catch (\Exception $e) {
        result([
            "status"  => FALSE,
            "message" => $e->getMessage()
        ]);
    }
}

if ($params["status"] === "get_list") {
    try {
        $sorgu = $db->query("SELECT * FROM wp_file_list");
        if ($table = $sorgu->fetchAll()) {
            $db = NULL;
            $table = array_values(array_map(function ($item) {
                return [
                    "id"            => $item["id"],
                    "filename"      => $item["filename"],
                    "cate_name"     => $item["cate_name"],
                    "cate_id"       => $item["cate_id"],
                    "filetype"      => $item["filetype"],
                    "filesize"      => $item["filesize"],
                    "filedate"      => $item["filedate"],
                    "byname"        => $item["byname"],
                    "byid"          => $item["byid"],
                    "fileurl"       => $item["fileurl"],
                ];
            }, $table));
            result([
                "status" => TRUE,
                "data"   => $table
            ]);
        }
        $db = NULL;
        result([
            "status"  => FALSE,
            "message" => "Veri Bulunamadı."
        ]);
    } catch (\Exception $e) {
        result([
            "status"  => FALSE,
            "message" => $e->getMessage()
        ]);
    }
}

if ($params["status"] === "get_cetegory") {
    try {
        $sorgu = $db->query("SELECT * FROM wp_file_category");
        if ($table = $sorgu->fetchAll()) {
            $db = NULL;
            $table = array_values(array_map(function ($item) {
                return [
                    "id"                    => $item["id"],
                    "category"              => $item["category"],
                    "category_auth"         => $item["category_auth"],
                    "category_create_date"  => $item["category_create_date"],
                    "category_update_date"  => $item["category_update_date"],
                    "category_text"         => $item["category_text"],
                ];
            }, $table));
            result([
                "status" => TRUE,
                "data"   => $table
            ]);
        }
        $db = NULL;
        result([
            "status"  => FALSE,
            "message" => "Veri Bulunamadı."
        ]);
    } catch (\Exception $e) {
        result([
            "status"  => FALSE,
            "message" => $e->getMessage()
        ]);
    }
}

if ($params["status"] === "get_cetegory_id") {
    $id = $params["id"];
    try {
        $sorgu = $db->query("SELECT * FROM wp_file_category WHERE id='$id '");
        if ($table = $sorgu->fetchAll()) {
            $db = NULL;
            $table = array_values(array_map(function ($item) {
                return [
                    "id"                    => $item["id"],
                    "category"              => $item["category"],
                    "category_auth"         => $item["category_auth"],
                    "category_create_date"  => $item["category_create_date"],
                    "category_update_date"  => $item["category_update_date"],
                    "category_text"         => $item["category_text"],
                ];
            }, $table));
            result([
                "status" => TRUE,
                "data"   => $table
            ]);
        }
        $db = NULL;
        result([
            "status"  => FALSE,
            "message" => "Veri Bulunamadı."
        ]);
    } catch (\Exception $e) {
        result([
            "status"  => FALSE,
            "message" => $e->getMessage()
        ]);
    }
}

if ($params["status"] === "get_cetegory_control") {
    $category = $params["category"];
    try {
        $sorgu = $db->query("SELECT * FROM wp_file_category WHERE category LIKE '$category'");
        if ($table = $sorgu->fetchAll()) {
            $db = NULL;
            $table = array_values(array_map(function ($item) {
                return ["id" => $item["id"],];
            }, $table));
            result([
                "status" => TRUE,
                "data"   => $table
            ]);
        }
        $db = NULL;
        result([
            "status"  => FALSE,
            "message" => "Veri Bulunamadı."
        ]);
    } catch (\Exception $e) {
        result([
            "status"  => FALSE,
            "message" => $e->getMessage()
        ]);
    }
}

if ($params["status"] === "get_cetegory_count")
{
    $sql = "SELECT count(*) FROM `wp_file_category`";
    $result = $db->prepare($sql);
    $result->execute();
    echo $number_of_rows = $result->fetchColumn();
}

if ($params["status"] === "get_file_count")
{
    $sql = "SELECT count(*) FROM `wp_file_list`";
    $result = $db->prepare($sql);
    $result->execute();
    echo $number_of_rows = $result->fetchColumn();
}