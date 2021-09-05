<?php
$input = json_decode(file_get_contents('php://input'), true);

$chooseString = $input['chooseString'];
$user_id = $input['user_id'];
$id = $input['id'];



$getDataLink = [];
$datetime = date('Y-m-d H:i:s');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dump";

try {
    // Khởi tạo đối tượng PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

    // Lấy dữ liệu bảng Links của admin
    $sql_stmt = "SELECT * FROM `links` where `link_id` = {$id}";

    $result = $pdo->query($sql_stmt);
    $result->setFetchMode(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $getDataLink[] = $row;
    }
    $data = $getDataLink[0];
    $getDataLink = [];
    $result = "";

    if ($chooseString) {
        //Lấy dữ liệu bảng Links của user
        $sql_stmt = "SELECT * FROM `links` where `user_id` = {$user_id}";
        $link_id_user_final = 0;

        $result = $pdo->query($sql_stmt);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $link_id_user_final = $row["link_id"];
        }

        //Xoá dữ liệu bảng Links của user

        $sql_stmt  = "DELETE FROM `links` WHERE `link_id` = {$link_id_user_final}";

        $pdo->exec($sql_stmt);
    }



    // Thêm bảng Links cho user
    $sql_stmt  = "INSERT INTO `links`(`project_id`, `user_id`, `type`, `url`, `settings`, `datetime` ) 
    VALUES ({$data['project_id']}, {$user_id}, '{$data['type']}','{$data['url']}',
     '{$data['settings']}', '{$datetime}')";

    $pdo->exec($sql_stmt);

    // Lấy dữ liệu bảng Links của user vừa tạo
    $sql_stmt = "SELECT * FROM `links` where `user_id` = {$user_id}";

    $result = $pdo->query($sql_stmt);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $new_row_user = [];

    foreach ($result as $row) {
        $new_row_user = $row;
    }

    // Lấy dữ liệu bảng biolinks_blocks của admin
    $sql_stmt = "SELECT * FROM `biolinks_blocks` where `link_id` = {$id}";

    $result = $pdo->query($sql_stmt);
    $result->setFetchMode(PDO::FETCH_ASSOC);


    foreach ($result as $row) {
        $getDataLink[] = $row;
    }

    // Thêm bảng biolink_blocks
    foreach ($getDataLink as $data) {
        $sql_stmt = "INSERT INTO `biolinks_blocks`(`user_id`, `link_id`, `type`,`location_url`, `settings`, `datetime`)
        VALUES({$user_id}, {$new_row_user['link_id']}, '{$data['type']}', '{$data['location_url']}', '{$data['settings']}', '{$datetime}')";
        $result = $pdo->query($sql_stmt);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}




echo json_encode($new_row_user['link_id']);
