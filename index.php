<?php
session_start();
include __DIR__ . '/View/header.php';
include __DIR__ . '/Models/Food.php';
include __DIR__ . '/Models/Toys.php';
include __DIR__ . '/Models/Accessories.php';
include __DIR__ . '/View/Card.php';
// $foods= Food::fetchFood();
// $toys= Toys::fetchToys();
// $accessories= Accessories::fetchAccessories();
?>
<main class="container">
    <div class="row">

    
<?php
$category = isset($_GET['category']) ? $_GET['category'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;


if ($type === 'food') {
    $items = Food::fetchFood($category);
} elseif ($type === 'toy') {
    $items = Toys::fetchToys($category);
} elseif ($type === 'accessory') {
    $items = Accessories::fetchAccessories($category);
} else {
    $itemsToys = Toys::fetchToys($category);
    $itemsFood = Food::fetchFood($category);
    $itemsAccessories = Accessories::fetchAccessories($category);
    $items = array_merge($itemsToys, $itemsFood, $itemsAccessories);
}

foreach ($items as $item) {
    createCard($item);
}
?>
</div>
    


</main>  
<?php

include __DIR__ . '/View/footer.php';
?>
    
