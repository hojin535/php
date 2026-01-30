<?php
require 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents('php://input'), true);
    $postId = $data['post_id'] ?? null;

    if ($postId) {
        // Simple increment logic for this demo
        $stmt = $db->prepare("UPDATE posts SET likes = likes + 1 WHERE id = :id");
        $stmt->bindValue(':id', $postId, SQLITE3_INTEGER);
        $result = $stmt->execute();

        if ($result) {
            // Fetch the new count
            $newCount = $db->querySingle("SELECT likes FROM posts WHERE id = $postId");
            echo json_encode([
                'success' => true,
                'likes' => $newCount
            ]);
            exit;
        }
    }
}

echo json_encode(['success' => false, 'message' => 'Invalid request']);
exit;
