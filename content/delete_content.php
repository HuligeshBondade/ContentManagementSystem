<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'unauthorized']);
    exit();
}

if (isset($_GET['id'])) {
    require '../config/config.php';
    $id = $_GET['id'];
    
    $sql = "DELETE FROM content WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'invalid']);
}
?>
