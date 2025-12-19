<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db_config.php';

try {
    // Accept JSON payload or form data
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) $data = $_POST;

    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $phone = trim($data['phone'] ?? '');
    $message = trim($data['message'] ?? '');

    if (!$name || !$email || !$message) {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => 'Missing required fields']);
        exit;
    }

    $pdo = getPDO();
    $stmt = $pdo->prepare('INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $email, $phone, $message]);

    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
