<?php
// src/index.php
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hello World PHP + PostgreSQL</title>
  </head>
  <body>
    <h1>Hello World — PHP + PostgreSQL</h1>
    <p>Thử kết nối đến cơ sở dữ liệu và hiển thị trạng thái:</p>

    <?php
    require_once 'db.php';

    $conn = getDbConnection();
    if ($conn) {
        echo "<p>Kết nối PostgreSQL thành công!</p>";
        // ví dụ lấy phiên bản PostgreSQL
        $stmt = $conn->query('SELECT version()');
        $ver = $stmt->fetch(PDO::FETCH_NUM);
        echo "<pre>Postgres version: " . htmlspecialchars($ver[0]) . "</pre>";
    } else {
        echo "<p style='color:red;'>Không thể kết nối PostgreSQL.</p>";
    }
    ?>
  </body>
</html>
