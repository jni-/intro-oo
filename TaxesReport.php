<?php

class TaxesReport {

  private $lines = array();

  public function __construct($name, $birthday) {
    $this->name = $name;
    $this->birthday = $birthday;
  }

  public function addLine($line_number, $line_value) {
    $this->lines[$line_number] =  $line_value;
  }

  public function getLine($line_number) {
    return $this->lines[$line_number];
  }

  public function getLineAsInteger($line_number) {
    return intval($this->lines[$line_number]);
  }

  public function getName() {
    return $this->name;
  }

  public function calculateAgeInYears() {
    $diff = (new DateTime())->diff($this->birthday);
    return $diff->y;
  }
}
