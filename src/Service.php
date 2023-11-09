<?php

namespace Adexe\ExamenT3\Elements\Services;

use DateTime;
use Adexe\ExamenT3\Elements\ElementSale;

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
    $characteristics = "Servicio: " . $this->name;
    if ($this->hasExpirationDate()) {
      $characteristics .= ", Fecha de ejecución: " . $this->executionDate;
    }
    return $characteristics;
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
    return false;
  }
}
