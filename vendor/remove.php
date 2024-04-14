<?php
session_start();
require_once 'connect.php';

$id = $_GET['id'];
$zero = "";
$zero1 = "0";

$stmt = $connect->prepare("UPDATE `users` SET `org1` = ?, `org1_rank` = ?, `org1_dv` = ?, `mod1` = ? WHERE `id` = ?");
$stmt->bind_param('sssss', $zero, $zero, $zero, $zero1, $id);
$stmt->execute();
$result = $stmt->get_result();

    header('Location: ../list.php');
?>
