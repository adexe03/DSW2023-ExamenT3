<?php

namespace Adexe\Dsw2023ExamenT3\Elements\Services;

use DateTime;
use Adexe\Dsw2023ExamenT3\Elements\Services\Service;

class Events extends Service
{
  private $dateEvent;

  public function __construct($name, $basePrice, $dateEvent)
  {
    parent::__construct($name, $basePrice, $dateEvent);
    $this->dateEvent = $dateEvent;
  }

  public function showFeatures()
  {
    return "Evento: " . $this->name . ", Fecha del evento: " . $this->dateEvent;
  }

  public function hasOcurred()
  {
    $today = new DateTime();
    $event = new DateTime($this->dateEvent);
    return $today > $event;
  }

  public function remainingDays()
  {
    $today = new DateTime();
    $event = new DateTime($this->dateEvent);
    $range = $today->diff($event);
    return $range->days;
  }

  public function calculateSellingPrice()
  {
    $remainingDays = $this->remainingDays();
    if ($remainingDays == 7) {
      $increment = parent::calculateSellingPrice() * 0.2;
      return parent::calculateSellingPrice() + $increment;
    } elseif ($remainingDays == 0) {
      $increment = parent::calculateSellingPrice() * 0.5;
      return parent::calculateSellingPrice() + $increment;
    } else {
      return parent::calculateSellingPrice();
    }
  }
}
