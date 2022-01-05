<?php
require __DIR__.'/parts/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
];

// TODO:沒有登入...

//<!--    `animal_sid`, `name`, `English_name`, `password`, `mobile`, `birthday`, `address` -->
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$password = $_POST['password'] ?? '';

if(empty($name)){
    $output['code'] = 403;
    $output['error'] = '請輸入正確的姓名';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
if(empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $output['code'] = 401;
    $output['error'] = '請輸入正確的名稱';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
if(empty($mobile) or !preg_match("/^09\d{2}-?\d{3}-?\d{3}$/", $mobile)){
    $output['code'] = 405;
    $output['error'] = '請輸入正確的手機號碼';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
if(empty($password)){
    $output['code'] = 407;
    $output['error'] = '請輸入密碼';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}

//<!--     `animal_sid`, `name`, `English_name`, `password`, `mobile`, `birthday`, `address` -->
$sql = "INSERT INTO `address_1`(
                        `animal_sid`,  
                        `name`,
                        `English_name`,
                        `password` 
                        `mobile`, 
                        `birthday`,
                        `addtess`
                        ) VALUES (?, ?, ?, ?, ?,?,?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $address_1,
    $animal_sid,  
    $name,
    $English_name,
    $password, 
    $mobile, 
    $birthday,
    $addtess,
    empty($_POST['birthday']) ? NULL : $_POST['birthday'],
    $_POST['address'] ?? '',
]);

    $output['success'] = $stmt->rowCount()==1;
    // $output['rowCount'] = $stmt->rowCount();


echo json_encode($output, JSON_UNESCAPED_UNICODE);