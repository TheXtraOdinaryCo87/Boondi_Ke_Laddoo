<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db_config.php';

try {
    // Accept JSON payload or form data
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) $data = $_POST;

    $full_name = trim($data['customer']['name'] ?? $data['full_name'] ?? '');
    $email = trim($data['customer']['email'] ?? $data['email'] ?? '');
    $phone = trim($data['customer']['phone'] ?? $data['phone'] ?? '');
    $address = trim($data['customer']['address'] ?? $data['address'] ?? '');
    $payment_method = trim($data['paymentMethod'] ?? $data['payment_method'] ?? '');
    $items = $data['items'] ?? [];
    $total = $data['total'] ?? 0;

    if (!$full_name || !$email || !$address) {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => 'Missing required fields']);
        exit;
    }

    $pdo = getPDO();
    $stmt = $pdo->prepare('INSERT INTO orders (full_name, email, phone, address, payment_method, items, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $items_json = json_encode($items, JSON_UNESCAPED_UNICODE);
    $stmt->execute([$full_name, $email, $phone, $address, $payment_method, $items_json, $total]);

    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
