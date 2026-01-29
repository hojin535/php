<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;

    if ($id) {
        $stmt = $db->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}

header("Location: index.php");
?>