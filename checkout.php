<?php
session_start();
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: preorder.php');
    exit;
}

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (empty($_SESSION['cart'])) {
    header('Location: preorder.php');
    exit;
}

$userId = $_SESSION['user_id'];

$collectionTime = $_POST['collection_time'] ?? null;

if (!$collectionTime) {
    header('Location: preorder.php');
    exit;
}

$stmt = $pdo->prepare(
    "INSERT INTO orders (user_id, collection_time)
    VALUES (:user_id, :collection_time)"
);

$stmt->execute([
    'user_id' => $userId,
    'collection_time' => $collectionTime
]);

$orderId = $pdo->lastInsertId();


$itemStmt = $pdo->prepare(
    "INSERT INTO order_items (order_id, product_name, quantity, price)
    VALUES (:order_id, :product_name, :quantity, :price)"
);

foreach ($_SESSION['cart'] as $item) {
    $itemStmt->execute([
        'order_id'     => $orderId,
        'product_name' => $item['product_name'],
        'quantity'     => (int) $item['quantity'],
        'price'        => (float) $item['price']
    ]);
}


unset($_SESSION['cart']);

$_SESSION['flash_success'] = 'Your order has been placed successfully.';

header('Location: account.php');
exit;
