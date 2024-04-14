<?php
session_start();
require_once 'connect.php';

$id = $_POST['id'];
$rank = $_POST['rank'];
$number = $_POST['number'];
$orga = $_SESSION['user']['org1'];

$stmt = $connect->prepare("UPDATE `users` SET `org1` = ? WHERE `id` = ?");
$stmt->bind_param('ss', $orga, $number);
$stmt->execute();
$result = $stmt->get_result();

    header('Location: ../list.php');
?>
