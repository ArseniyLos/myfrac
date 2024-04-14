<?php

session_start();
require_once 'connect.php';

$key = $_POST['key'];
$name = $_POST['name'];
$bank = $_POST['bank'];
$zero = "0";

$error_fields = [];

if ($key === '') {
    $error_fields[] = 'key';
}

if ($bank === '') {
    $error_fields[] = 'bank';
}

if ($name === '') {
    $error_fields[] = 'name';
}

if (!empty($error_fields)) {
    header('Location: /registration.php?badfields');
    die();
}

$stmt = $connect->prepare("INSERT INTO `users` (`name`, `password`, `bank`, `mod1`, `mod2`, `mod3`) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssss', $name, $key, $bank, $zero, $zero, $zero);
$stmt->execute();
$result = $stmt->get_result();



    header('Location: ../index.php');
?>
