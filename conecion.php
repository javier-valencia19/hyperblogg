<?php
session_start();

// Función para agregar un producto al carrito
function addItemToCart($name, $price) {
    $_SESSION['cart'][] = array('name' => $name, 'price' => $price);
}

// Función para calcular el total del carrito
function calculateTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'];
    }
    return $total;
}

// Función para vaciar el carrito
function clearCart() {
    unset($_SESSION['cart']);
}

// Manejar solicitudes AJAX
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'addItem':
            if (isset($_POST['name'], $_POST['price'])) {
                addItemToCart($_POST['name'], $_POST['price']);
            }
            break;
        case 'calculateTotal':
            echo calculateTotal();
            break;
        case 'clearCart':
            clearCart();
            break;
    }
}
?>
