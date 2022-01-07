<?php
require __DIR__. '/parts/__connect_db.php';

//沒有登入管理帳號,就轉向
// if(! isset($_SESSION['admin'])){
//    header('Location: index_.php');
//    exit;
// }

if(isset($_GET['SearchData'])){
    $SearchData = intval($_GET['SearchData']);
    $pdo->query("DELETE * FROM `address_1` WHERE `name` LIKE '大象'");
}

$come_from = $_SERVER['HTTP_REFERER'] ?? 'list.php';

header("Location: $come_from");

