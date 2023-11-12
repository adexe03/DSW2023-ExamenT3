<?php
require_once '../src/Store.php';
require_once '../src/ElementSale.php';
require_once '../src/Product.php';
require_once '../src/Service.php';
require_once '../src/Events.php';
require_once '../src/SessionService.php';
require_once '../src/MixedService.php';
require_once '../src/NormalService.php';

use Adexe\Dsw2023ExamenT3\Elements\Store;
use Adexe\Dsw2023ExamenT3\Elements\Products\Product;
use Adexe\Dsw2023ExamenT3\Elements\Services\Events;
use Adexe\Dsw2023ExamenT3\Elements\Services\SessionService;
use Adexe\Dsw2023ExamenT3\Elements\Services\MixedService;
use Adexe\Dsw2023ExamenT3\Elements\Services\NormalService;

// Crea una instancia de la tienda
$miTienda = new Store();

// Añade 5 productos
$miTienda->insertItem(new Product("Producto No Perecedero 1", 20.0, "Fabricante A", 500, 1000));
$miTienda->insertItem(new Product("Producto No Perecedero 2", 30.0, "Fabricante B", 700, 1500));
$miTienda->insertItem(new Product("Producto Perecedero Caducado", 15.0, "Fabricante C", 300, 800, "2022-01-01"));
$miTienda->insertItem(new Product("Producto Perecedero Caduca en 2 o 3 días", 25.0, "Fabricante D", 400, 1200, date('Y-m-d', strtotime('+3 days'))));
$miTienda->insertItem(new Product("Producto Perecedero Caduca en 20 o 25 días", 35.0, "Fabricante E", 600, 1800, date('Y-m-d', strtotime('+25 days'))));

// Añade servicios
$miTienda->insertItem(new Events("Evento Caducado", 50.0, "2022-01-01"));
$miTienda->insertItem(new Events("Evento Caduca Hoy", 60.0, date('Y-m-d')));
$miTienda->insertItem(new Events("Evento Caduca en unos meses", 70.0, date('Y-m-d', strtotime('+6 months'))));
$miTienda->insertItem(new SessionService("Servicio Sesiones Pocas Sesiones", 40.0, 2));
$miTienda->insertItem(new SessionService("Servicio Sesiones Sin Sesiones", 45.0, 0));
$miTienda->insertItem(new MixedService("Servicio Mixto Caducado", 80.0, 5, "2022-01-01"));
$miTienda->insertItem(new MixedService("Servicio Mixto No Caducado", 90.0, 8, "2023-12-01"));
$miTienda->insertItem(new NormalService("Servicio Normal 1", 30.0));
$miTienda->insertItem(new NormalService("Servicio Normal 2", 35.0));

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

// $jsonString = json_encode($miTienda, JSON_PRETTY_PRINT);
// file_put_contents($dataFile, json_encode($jsonString));
