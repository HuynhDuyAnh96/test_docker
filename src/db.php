<?php
// src/db.php
// Kết nối PostgreSQL bằng PDO, đọc config từ biến môi trường

function getDbConnection() {
    $host = getenv('DB_HOST') ?: 'localhost';
    $port = getenv('DB_PORT') ?: '5432';
    $dbname = getenv('DB_NAME') ?: 'hello_db';
    $user = getenv('DB_USER') ?: 'hello_user';
    $pass = getenv('DB_PASS') ?: 'hello_pass';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $pdo;
    } catch (PDOException $e) {
        // Hiển thị lỗi để dev debug
        echo "<p>Lỗi PDO: " . htmlspecialchars($e->getMessage()) . "</p>";
        return null;
    }
}
