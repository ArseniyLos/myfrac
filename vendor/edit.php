<?php
session_start();
require_once 'connect.php';

$id = $_POST['id'];
$rank = $_POST['rank'];
$dv = $_POST['dv'];
$company = $_POST['company'];

$stmt = $connect->prepare("UPDATE `users` SET `org1_rank` = ?, `org1_dv` = ? WHERE `id` = ?");
$stmt->bind_param('sss', $rank, $dv, $id);
$stmt->execute();
$result = $stmt->get_result();

    header('Location: ../edit.php?id=' . $id . '&company=' . $company . '');
?>
