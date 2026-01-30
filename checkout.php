<?php
session_start();
require 'config/db.php';
require 'config/validate.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: preorder.php');
    exit;
}

if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash_error'] = 'Please sign in to continue.';
    header('Location: login.php');
    exit;
}

if (empty($_SESSION['cart'])) {
    $_SESSION['flash_error'] = 'Your cart is empty.';
    header('Location: preorder.php');
    exit;
}

$userId = $_SESSION['user_id'];

$token = $_POST['csrf_token'] ?? '';
if (empty($token) || $token !== ($_SESSION['csrf_token'] ?? '')) {
    $_SESSION['flash_error'] = 'Something went wrong. Please try again.';
    header('Location: preorder.php');
    exit;
}

$collectionTime = $_POST['collection_time'] ?? null;

if (!$collectionTime) {
    $_SESSION['flash_error'] = 'Please choose a collection time.';
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
