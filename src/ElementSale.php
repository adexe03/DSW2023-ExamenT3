<?php

namespace Adexe\Dsw2023ExamenT3\Elements;

abstract class ElementSale
{
  protected $name;
  protected $basePrice;
  protected $tax = 0.07;

  public function __construct($name, $basePrice)
  {
    $this->name = $name;
    $this->basePrice = $basePrice;
  }

  public function setTaxPercentage($taxPercentage)
  {
    $this->tax = $taxPercentage;
  }

  public function calculateSellingPrice()
  {
    $priceWithTax = $this->basePrice * ($this->basePrice * (1 + $this->tax));
    return $priceWithTax;
  }

  abstract public function showFeatures();
  abstract public function hasExpirationDate();
  abstract public function hasExpired();
}
