<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myfrac";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO chat (msg_sent, msg, msg_name) VALUES (:msg_sent, :msg, :msg_name)");

    $stmt->bindParam(':msg_sent', $msg_sent);
    $stmt->bindParam(':msg', $msg);
    $stmt->bindParam(':msg_name', $msg_name);

    $msg = $_POST['text'];
    $msg_name = $_SESSION['user']['name'];
    $msg_sent = $_SESSION['user']['id'];
    $stmt->execute();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
header('Location: /chat.php');
$conn = null;
?>
