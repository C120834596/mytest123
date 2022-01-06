<?php
require __DIR__ . '/parts/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
];

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "INSERT INTO `address_1`( 
                        `name`,
                        `English_name`,
                        `password`,
                        `mobile`, 
                        `birthday`,
                        `address`
                        ) VALUES (?, ?, ?, ?, ?,?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $name,
    $English_name,
    $password, 
    $mobile, 
    empty($_POST['birthday']) ? NULL : $_POST['birthday'],
    $_POST['address'] ?? '',
]);

    $output['success'] = $stmt->rowCount()==1;
    //$output['rowCount'] = $stmt->rowCount();


echo json_encode($output, JSON_UNESCAPED_UNICODE);