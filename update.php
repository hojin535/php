<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $db->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':content', $content);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header("Location: view.php?id=$id");
}
?>