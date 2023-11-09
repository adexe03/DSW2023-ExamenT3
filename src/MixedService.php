<?php

use Adexe\ExamenT3\Elements\Services\Service;

class MixedService extends Service
{
  private $contractedSessions;
  private $expirationDate;

  public function __construct($name, $basePrice, $contractedSessions, $expirationDate)
  {
    parent::__construct($name, $basePrice);
    $this->contractedSessions = $contractedSessions;
    $this->expirationDate = $expirationDate;
  }

  public function showFeatures()
  {
    return "Servicio mixto: " . $this->name . ", Sesiones contratadas: " . $this->contractedSessions . ", Fecha de caducidad: " . $this->expirationDate;
  }

  public function calculateSellingPrice()
  {
    return parent::calculateSellingPrice();
  }
}
