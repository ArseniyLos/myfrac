<?php
session_start();
require_once 'connect.php';

$id = $_SESSION['user']['id'];

$stmt = $connect->prepare("DELETE FROM `users` WHERE `id` = ?");
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();

    header('Location: ../index.php');
?>
