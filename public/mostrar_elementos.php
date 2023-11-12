<?php

// Lee la tienda desde el archivo
$tiendaData = file_get_contents('../data/tienda_data.json');
$miTienda = json_decode($tiendaData);

// Filtra según los parámetros de la URL
$mostrar = $_GET['mostrar'] ?? 'todos';

// Muestra los elementos según el filtro
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
