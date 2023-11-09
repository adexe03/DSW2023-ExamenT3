<?php
use Adexe\ExamenT3\Elements\Products\Product;
use Adexe\ExamenT3\Elements\Services\Service;
class Store
{
  private $elements = [];
  private $tax = 0.07;

  public function setTax($percentage)
  {
    $this->tax = $percentage;
  }

  public function insertItem($element)
  {
    $this->elements[] = $element;
  }

  public function showItems()
  {
    foreach ($this->elements as $element) {
      echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice($this->tax), 2) . "<br>";
    }
  }

  public function showProducts()
  {
    foreach ($this->elements as $element) {
      if ($element instanceof Product) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice($this->tax), 2) . "<br>";
      }
    }
  }

  public function showServices()
  {
    foreach ($this->elements as $element) {
      if ($element instanceof Service) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice($this->tax), 2) . "<br>";
      }
    }
  }

  public function showElementsWithDateExpiration()
  {
    foreach ($this->elements as $element) {
      if ($element->hasExpirationDate()) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice($this->tax), 2) . "<br>";
      }
    }
  }

  public function showSaleableItems()
  {
    foreach ($this->elements as $element) {
      if (!$element->hasExpired()) {
        echo $element->showFeatures() . " Precio de venta: " . number_format($element->calculateSellingPrice($this->tax), 2) . "<br>";
      }
    }
  }
}