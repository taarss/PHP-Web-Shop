<?php
    include 'main.php';
    if (isset($_POST['get100'])) {
            $stmt = $con->prepare('SELECT * FROM products LIMIT 100');
            $stmt->execute();
            $result = $stmt->get_result();
            $categories = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $json=json_encode($categories);
            echo $json;
        }