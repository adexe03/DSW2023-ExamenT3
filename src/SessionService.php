<?php

namespace Adexe\Dsw2023ExamenT3;

use Adexe\Dsw2023ExamenT3\Service;

class SessionService extends Service
{
  private $sessionsContracted;

  public function __construct($name, $basePrice, $sessionsContracted)
  {
    parent::__construct($name, $basePrice);
    $this->sessionsContracted = $sessionsContracted;
  }

  public function showFeatures()
  {
    return "Servicio de sesiones: " . $this->name . ", Sesiones contratadas: " . $this->sessionsContracted . ", ";
  }

  public function consumeSession()
  {
    if ($this->sessionsContracted > 0) {
      $this->sessionsContracted--;
    }
  }

  public function calculateSellingPrice()
  {
    return parent::calculateSellingPrice();
  }
}
