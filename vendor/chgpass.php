<?php

session_start();
require_once 'connect.php';

$password = $_POST['password'];
$new_password = $_POST['new_password'];
$old_pass = $_SESSION['user']['password'];
$uid = $_SESSION['user']['id'];

$error_fields = [];

if ($password === '') {
    $error_fields[] = 'password';
}

if ($new_password === '') {
    $error_fields[] = 'new_password';
}

if (!empty($error_fields)) {
    header('Location: /security.php?badfields');
    die();
}

if ($password != $old_pass) {
    header('Location: /security.php?badpass');
    die();
}
else {
$stmt = $connect->prepare("UPDATE `users` SET `password` = ? WHERE `id` = ?");
$stmt->bind_param('ss', $new_password, $uid);
$stmt->execute();
$result = $stmt->get_result();

    header('Location: logout.php');
}
?>
