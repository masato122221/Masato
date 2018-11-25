<?php
 header('Content-Type: text/html; charset=UTF-8');
 // mission_3-1開始
$dsn='mysql:dbname=tt_570_99sv_coco_com;host=localhost';
$user='tt-570.99sv-coco';
$password='z8QeP7R2';
$pdo=new PDO($dsn,$user,$password);
// mission_3-1完了
//テーブル作成4-1
$sql="CREATE TABLE tbtest3"
."("
."id INT PRIMARY KEY AUTO_INCREMENT,"
."name char(32),"
."comment TEXT,"
."data TEXT,"
."password char(32)"
.");";
$stmt=$pdo->query($sql);
?>