<?php
require 'db.php';
$result = $db->query("SELECT * FROM posts ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Simple Board</title>
</head>

<body>
    <h1>Simple Board</h1>
    <a href="write.php">Write New Post</a>
    <ul>
        <?php while ($row = $result->fetchArray()): ?>
            <li>
                <a href="view.php?id=<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['title']) ?>
                </a>
                (<?= $row['created_at'] ?>)
            </li>
        <?php endwhile; ?>
    </ul>
</body>

</html>