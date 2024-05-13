<?php
session_start();


include __DIR__ . '/Models/Food.php';
include __DIR__ . '/Models/Toys.php';
include __DIR__ . '/Models/Accessories.php';
include __DIR__ . '/View/card.php';

$category = isset($_GET['category']) ? $_GET['category'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;

if (!isset($_SESSION['carrello'])) {
    $_SESSION['carrello'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $itemsToys = Toys::fetchToys($category);
    $itemsFood = Food::fetchFood($category);
    $itemsAccessories = Accessories::fetchAccessories($category);
    $cartItems = array_merge($itemsToys, $itemsFood, $itemsAccessories);

    $arrayCart = array_filter($cartItems, function ($value) use ($id){
        return $id === $value->id;
    });

    foreach ($arrayCart as $item) {
        $_SESSION['carrello'][] = $item;
    }
}


$total = 0;
foreach ($_SESSION['carrello'] as $item) {
    createCard($item);
    $total += $item->prezzo;
}

echo "<p>Totale: " . $total . "€</p>";
