<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
    $stmt->bindValue(':title', $_POST['title']);
    $stmt->bindValue(':content', $_POST['content']);
    $stmt->execute();
    header('Location: index.php');
}
?>