<?php
$lifetime=1200;
session_set_cookie_params($lifetime);

session_start();
require_once 'connect.php';

$key = $_POST['key'];
$name = $_POST['name'];

$error_fields = [];

if ($key === '') {
    $error_fields[] = 'key';
}

if ($name === '') {
    $error_fields[] = 'name';
}

if (!empty($error_fields)) {
    header('Location: /index.php?badfields');
    die();
}

$stmt = $connect->prepare("SELECT * FROM `users` WHERE `password` = ? AND `name` = ?");
$stmt->bind_param('ss', $key, $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "password" => $user['password'],
        "vk" => $user['vk'],
        "reg" => $user['date'],
        "org1" => $user['org1'],
        "mod1" => $user['mod1'],
        "org2" => $user['org2'],
        "org3" => $user['org3'],
    ];

    header('Location: ../main.php');
} else {
    header('Location: /index.php?badauth');
}
?>
