<?php

namespace Adexe\Dsw2023ExamenT3;

use Adexe\Dsw2023ExamenT3\Service;
use DateTime;

class MixedService extends Service
{
  private $sessionsContracted;
  private $expirationDate;

  public function __construct($name, $basePrice, $sessionsContracted, $expirationDate = null)
  {
    parent::__construct($name, $basePrice);
    $this->sessionsContracted = $sessionsContracted;
    $this->expirationDate = $expirationDate;
  }

  public function hasExpirationDate()
  {
    return !is_null($this->expirationDate);
  }

  public function consumeSession()
  {
    $today = new DateTime();
    $expiration = new DateTime($this->expirationDate);
    if ($today->diff($expiration)->days > 0) {
      $this->sessionsContracted--;
    }
  }

  public function hasExpired()
  {
    $today = new DateTime();
    $expiration = new DateTime($this->expirationDate);
    return $today > $expiration;
  }

  public function showFeatures()
  {
    return "Servicio mixto: " . $this->name . ", Sesiones contratadas: " . $this->sessionsContracted . ", Fecha de caducidad: " . $this->expirationDate . ", ";
  }

  public function calculateSellingPrice()
  {
    return parent::calculateSellingPrice();
  }
}
