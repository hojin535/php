<?php
require 'db.php';
$id = $_GET['id'] ?? 0;
$stmt = $db->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->bindValue(':id', $id);
$result = $stmt->execute();
$post = $result->fetchArray();

if (!$post) {
    echo "Post not found";
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?= htmlspecialchars($post['title']) ?>
    </title>
</head>

<body>
    <h1>
        <?= htmlspecialchars($post['title']) ?>
    </h1>
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
    <p><small>Posted at
            <?= $post['created_at'] ?>
        </small></p>
    <p>
        <a href="edit.php?id=<?= $post['id'] ?>">Edit</a> |
    <form action="delete.php" method="post" style="display:inline;" onsubmit="return confirm('정말로 삭제하시겠습니까?');">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <button type="submit"
            style="color:red; cursor:pointer; background:none; border:none; text-decoration:underline; font-size:1em; padding:0;">Delete</button>
    </form>
    </p>
    <a href="index.php">Back to List</a>
</body>

</html>