<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: preorder.php');
    exit;
}

$productKey  = $_POST['product_key'] ?? null;
$productName = $_POST['product_name'] ?? null;
$price       = isset($_POST['price']) ? (float) $_POST['price'] : null;
$quantity    = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;

if (!$productKey || !$productName || !$price || $quantity < 1) {
    header('Location: preorder.php');
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$productKey])) {
    $_SESSION['cart'][$productKey]['quantity'] += $quantity;
} else {
    $_SESSION['cart'][$productKey] = [
        'product_name' => $productName,
        'quantity'     => $quantity,
        'price'        => $price
    ];
}

header('Location: preorder.php');
exit;
