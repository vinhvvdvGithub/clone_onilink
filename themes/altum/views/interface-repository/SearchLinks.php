<?php

use Altum\Middlewares\Authentication;
use Altum\Database\Database;
use Altum\App;

$input = json_decode(file_get_contents('php://input'), true);

$keyword = $input['keyword'];
$result_Search_Link = [];
$getKeyword = $keyword;


$servername = "localhost";
$username = "root";
$password = "VD_Y3NS9.2[CtinJ";
$dbname = "onilink_db";

try {
   $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $pdo->exec('SET NAMES "utf8"');


   $sql_stmt = "SELECT * FROM `links` JOIN `projects` on `links`.`project_id` = `projects`.`project_id` where `projects`.`name` like '%{$getKeyword}%'";

   $result = $pdo->query($sql_stmt);
   $result->setFetchMode(PDO::FETCH_ASSOC);



   foreach ($result as $row) {
      $result_Search_Link[] = $row;
   }
} catch (PDOException $e) {
   echo $e->getMessage();
}




echo json_encode($result_Search_Link);
