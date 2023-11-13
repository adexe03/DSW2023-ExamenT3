<?php

namespace Adexe\Dsw2023ExamenT3;

use Adexe\Dsw2023ExamenT3\Product;
use Adexe\Dsw2023ExamenT3\Service;

class Store
{
  private $elements = [];

  public function insertItem($element)
  {
    $this->elements[] = $element;
  }

  public function showItems()
  {
    foreach ($this->elements as $element) {
      echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "€<br>";
    }
  }

  public function showProducts()
  {
    foreach ($this->elements as $element) {
      if ($element instanceof Product) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "€<br>";
      }
    }
  }

  public function showServices()
  {
    foreach ($this->elements as $element) {
      if ($element instanceof Service) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "€<br>";
      }
    }
  }

  public function showElementsWithDateExpiration()
  {
    foreach ($this->elements as $element) {
      if ($element->hasExpirationDate()) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "€<br>";
      }
    }
  }

  public function showSaleableItems()
  {
    foreach ($this->elements as $element) {
      if ($element->hasExpired() == false) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice(), 2) . "€<br>";
      }
    }
  }
}
