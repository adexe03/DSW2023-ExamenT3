<?php

namespace Adexe\Dsw2023ExamenT3;

use Adexe\Dsw2023ExamenT3\Service;

class NormalService extends Service
{
  public function __construct($name, $basePrice)
  {
    parent::__construct($name, $basePrice);
  }

  public function showFeatures()
  {
    return "Servicio normal: " . $this->name . ", ";
  }

  public function calculateSellingPrice()
  {
    return parent::calculateSellingPrice();
  }
}
