<?php

namespace Adexe\Dsw2023ExamenT3;

use DateTime;
use Adexe\Dsw2023ExamenT3\ElementSale;

class Service extends ElementSale
{
  protected $executionDate;

  public function __construct($name, $basePrice, $executionDate = null)
  {
    parent::__construct($name, $basePrice);
    $this->executionDate = $executionDate;
  }

  public function showFeatures()
  {
    return "Servicio: " . $this->name . ", Fecha de ejecución: " . $this->executionDate;
  }

  public function hasExpirationDate()
  {
    return !is_null($this->executionDate);
  }

  public function hasExpired()
  {
    if ($this->hasExpirationDate()) {
      $today = new DateTime();
      $execution = new DateTime($this->executionDate);
      return $today > $execution;
    }
  }
}
