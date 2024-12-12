<?php
require 'constant/config.php';

$data = json_decode(file_get_contents("php://input"), true);

$userId = $data['id'];
$status = $data['Status'];

try {
    $stmt = $conn->prepare("UPDATE users SET Status = :status WHERE id = :id");
    $stmt->execute([
        ':status' => $status,
        ':id' => $userId
    ]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
