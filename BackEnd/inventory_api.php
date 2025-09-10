<?php
header("Content-Type: application/json");
include "db_connect.php";

// Handle GET → Fetch inventory
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM inventory";
    $result = $conn->query($sql);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
}

// Handle POST → Add new item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $conn->prepare("INSERT INTO inventory (item_name, category, quantity, unit_price, supplier_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssidi", $data['item_name'], $data['category'], $data['quantity'], $data['unit_price'], $data['supplier_id']);
    $stmt->execute();
    echo json_encode(["success" => true]);
}

// Handle DELETE → Delete item
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $stmt = $conn->prepare("DELETE FROM inventory WHERE item_id=?");
    $stmt->bind_param("i", $data['item_id']);
    $stmt->execute();
    echo json_encode(["success" => true]);
}
?>
