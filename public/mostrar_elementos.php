<?php
require 'crear_tienda.php';

// Filtra según los parámetros de la URL
$mostrar = $_GET['mostrar'] ?? 'todos';

// Muestra los elementos por filtro
switch ($mostrar) {
    case 'productos':
        $miTienda->showProducts();
        break;
    case 'servicios':
        $miTienda->showServices();
        break;
    case 'expiracion':
        $miTienda->showElementsWithDateExpiration();
        break;
    case 'vendibles':
        $miTienda->showSaleableItems();
        break;
    default:
        $miTienda->showItems();
        break;
}
