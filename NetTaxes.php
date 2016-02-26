<?php

class NetTaxes {

  private $name;
  private $revenu;

  public function __construct($name, $net_revenu) {
    $this->name = $name;
    $this->revenu = $net_revenu;
  }

  public function display() {
    echo "Net revenu for " . $this->name . " is " . $this->revenu . "\n";
  }
}
