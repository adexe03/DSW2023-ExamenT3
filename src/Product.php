<?php

namespace Adexe\ExamenT3\Elements\Products;

use DateTime;
use Adexe\ExamenT3\Elements\ElementSale;

class Product extends ElementSale
{
  private $manufacturer;
  private $weight;
  private $volume;
  private $expirationDate;

  public function __construct($name, $basePrice, $manufacturer, $weight, $volume, $expirationDate = null)
  {
    parent::__construct($name, $basePrice);
    $this->manufacturer = $manufacturer;
    $this->weight = $weight;
    $this->volume = $volume;
    $this->expirationDate = $expirationDate;
  }

  public function showFeatures()
  {
    $characteristics = "Producto: " . $this->name . " Fabricante: " . $this->manufacturer;
    $characteristics .= " Peso: " . $this->weight . " gramos Volumen: " . $this->volume . " cm3";
    if ($this->hasExpirationDate()) {
      $characteristics .= " Fecha de caducidad: " . $this->expirationDate;
    }
    return $characteristics;
  }

  public function hasExpirationDate()
  {
    return !is_null($this->expirationDate);
  }

  public function hasExpired()
  {
    if ($this->hasExpirationDate()) {
      $today = new DateTime();
      $expiration = new DateTime($this->expirationDate);
      return $today > $expiration;
    }
    return false;
  }

  public function calculateShippingCost()
  {
    $shippingCost = 2;

    $shippingCost += $this->weight * 0.0002;

    $incrementalVolume = floor($this->volume / 1000);
    $shippingCost += $incrementalVolume;

    return round($shippingCost, 2);
  }

  public function calculateSellingPrice()
  {
    $priceWithTax = $this->discountPrice();
    $shippingCost = $this->calculateShippingCost();

    $totalPrice = $priceWithTax + $shippingCost;

    return round($totalPrice, 2);
  }

  public function discountPrice()
  {
    if ($this->hasExpirationDate()) {
      $today = new DateTime();
      $expiration = new DateTime($this->expirationDate);

      $range = $today->diff($expiration);

      if ($range->m == 1) {
        // 10% descuento
        $discount = parent::calculateSellingPrice() * 0.1;
        return parent::calculateSellingPrice() - $discount;
      } elseif ($range->days <= 10) {
        // 25% descuento
        $discount = parent::calculateSellingPrice() * 0.25;
        return parent::calculateSellingPrice() - $discount;
      }
    }

    return parent::calculateSellingPrice();
  }
}
