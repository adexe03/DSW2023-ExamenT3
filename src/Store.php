<?php

namespace Adexe\Dsw2023ExamenT3\Elements;

use Adexe\Dsw2023ExamenT3\Elements\Products\Product;
use Adexe\Dsw2023ExamenT3\Elements\Services\Service;

class Store
{
  private $elements = [];
  private static $dataFile = '../data/tienda_data.json';

  public function insertItem($element)
  {
    $this->elements[] = $element;
  }

  public function showItems()
  {
    foreach ($this->elements as $element) {
      echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "<br>";
    }
  }

  public function showProducts()
  {
    foreach ($this->elements as $element) {
      if ($element instanceof Product) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "<br>";
      }
    }
  }

  public function showServices()
  {
    foreach ($this->elements as $element) {
      if ($element instanceof Service) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "<br>";
      }
    }
  }

  public function showElementsWithDateExpiration()
  {
    foreach ($this->elements as $element) {
      if ($element->hasExpirationDate()) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "<br>";
      }
    }
  }

  public function showSaleableItems()
  {
    foreach ($this->elements as $element) {
      if (!$element->hasExpired()) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "<br>";
      }
    }
  }
}
