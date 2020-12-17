<?php
    include 'main.php';
    $stmt = $con->prepare('DELETE FROM products WHERE id = ?');
    $stmt->bind_param('i', $_POST['id']);
    $stmt->execute();
    $stmt->close();

