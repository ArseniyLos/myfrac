<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myfrac";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO news (author, category, name, short, full, img, frac) VALUES (:author, :type, :zag, :short, :text, :img, :frac)");

    $stmt->bindParam(':text', $text);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':zag', $zag);
    $stmt->bindParam(':short', $short);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':frac', $frac);

    $author = $_POST['author'];
    $type = $_POST['type'];
    $zag = $_POST['zag'];
    $short = $_POST['short'];
    $text = $_POST['text'];
    $img = $_POST['img'];
    $frac = $_POST['frac'];
    $stmt->execute();

} catch(PDOException $e) {
    $error = $e->getMessage();
}
header('Location: /news.php?error=' . $error . '');
$conn = null;
?>
