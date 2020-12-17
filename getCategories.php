<?php
    include 'main.php';
    if (isset($_POST['callFunc2'])) {
            $stmt = $con->prepare('SELECT * FROM categories');
            $stmt->execute();
            $result = $stmt->get_result();
            $categories = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $json=json_encode($categories);
            echo $json;
        }