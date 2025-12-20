<?php
// test_db.php — simple verifier for the project's DB using db_config.php
require __DIR__ . '/db_config.php';

try {
    $pdo = getPDO();
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "Connected to DB. Tables found:\n";
    foreach ($tables as $t) {
        echo "- $t\n";
    }
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
