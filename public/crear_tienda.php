<?php

require '../vendor/autoload.php';

use Adexe\Dsw2023ExamenT3\Store;
use Adexe\Dsw2023ExamenT3\Product;
use Adexe\Dsw2023ExamenT3\Events;
use Adexe\Dsw2023ExamenT3\SessionService;
use Adexe\Dsw2023ExamenT3\MixedService;
use Adexe\Dsw2023ExamenT3\NormalService;


$miTienda = new Store();

// PRODUCTOS
// 2 productos no perecederos
$miTienda->insertItem(new Product("Intel Core I5-14600K", 329.00, "Intel", 500, 1000));
$miTienda->insertItem(new Product("AMD Ryzen 7 7700X", 356.90, "AMD", 700, 1500));

// 1 producto perecedero que haya caducado
$miTienda->insertItem(new Product("Zotac Gaming GeForce RTX 2070 Super", 397.55, "Zotac", 300, 800, "2022-01-01"));

// 1 producto perecedero que caduque en 2 o 3 días
$miTienda->insertItem(new Product("ASUS ROG STRIX GeForce RTX 3080 OC", 861.70, "ASUS", 400, 1200, date('Y-m-d', strtotime('+3 days'))));

// 1 producto perecedero que caduque en 20 0 25 días
$miTienda->insertItem(new Product("ASUS ROG STRIX Z790-E GAMING WIFI II", 519.01, "ASUS", 600, 1800, date('Y-m-d', strtotime('+25 days'))));

// Servicios
// 3 eventos uno caducado, otro que caduca hoy y otro que caduque en unos meses
$miTienda->insertItem(new Events("Tokyo Game Show 2022", 50.0, "2022-01-01"));
$miTienda->insertItem(new Events("E3 2023", 60.0, date('Y-m-d')));
$miTienda->insertItem(new Events("The Game Awards", 70.0, date('Y-m-d', strtotime('+6 months'))));

// 2 servicios por sesiones: uno con pocas y otro sin sesiones
$miTienda->insertItem(new SessionService("Aqua Club Termal", 40.0, 2));
$miTienda->insertItem(new SessionService("Abono joven", 45.0, 0));

// 2 servicios mixtos: uno caducado y otro no
$miTienda->insertItem(new MixedService("Xbox Game Pass", 60.0, 5, "2022-01-01"));
$miTienda->insertItem(new MixedService("PlayStation Plus", 90.0, 8, "2023-12-01"));

// 2 servicios normales
$miTienda->insertItem(new NormalService("Ubisoft+", 30.0));
$miTienda->insertItem(new NormalService("EA Play", 35.0));
