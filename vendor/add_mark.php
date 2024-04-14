<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myfrac";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO comments (text, from_a, to_id, frac) VALUES (:text, :from_a, :to_id, :frac)");

    $stmt->bindParam(':text', $text);
    $stmt->bindParam(':from_a', $from);
    $stmt->bindParam(':to_id', $to_id);
    $stmt->bindParam(':frac', $frac);

    $to_id = $_POST['id'];
    $frac = $_POST['company'];
    $from = $_POST['author'];
    $text = $_POST['text'];
    $stmt->execute();

} catch(PDOException $e) {
    $error = $e->getMessage();
}
header('Location: /history_user.php?id=' . $to_id . '&company=' . $frac . '&' . $error . '');
$conn = null;
?>
