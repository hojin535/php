<?php
require 'db.php';
$id = $_GET['id'] ?? 0;
$stmt = $db->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->bindValue(':id', $id);
$result = $stmt->execute();
$post = $result->fetchArray();

if (!$post) {
    die("Post not found");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Post</title>
</head>

<body>
    <h1>Edit Post</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br>
        <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea><br>
        <button type="submit">Update</button>
    </form>
    <a href="view.php?id=<?= $post['id'] ?>">Cancel</a>
</body>

</html>