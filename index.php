<?php
require 'db.php';
$result = $db->query("SELECT * FROM posts ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Simple Board</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Simple Board</h1>

        <div class="controls">
            <input type="text" id="search-input" placeholder="Search posts...">
            <a href="write.php" class="write-btn">Write New</a>
        </div>

        <ul id="post-list">
            <?php while ($row = $result->fetchArray()): ?>
                <li class="post-item">
                    <div class="post-info">
                        <a href="view.php?id=<?= $row['id'] ?>" class="post-link">
                            <?= htmlspecialchars($row['title']) ?>
                        </a>
                        <span class="date"><?= $row['created_at'] ?></span>
                    </div>
                    <div class="like-container">
                        <span class="like-count"><?= $row['likes'] ?? 0 ?></span>
                        <button class="like-btn" data-id="<?= $row['id'] ?>" title="Like this post">&hearts;</button>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <script src="script.js" defer></script>
</body>

</html>