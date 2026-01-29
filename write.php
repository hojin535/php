<!DOCTYPE html>
<html>

<head>
    <title>Write Post</title>
</head>

<body>
    <h1>Write Post</h1>
    <form action="save.php" method="post">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="content" placeholder="Content" required></textarea><br>
        <button type="submit">Save</button>
    </form>
    <a href="index.php">Back to List</a>
</body>

</html>