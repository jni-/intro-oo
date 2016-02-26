<?php

require_once("NetTaxes.php");

class NetRevenuCalculator {

  private $revenu_rules;

  public function __construct($revenu_rules) {
    $this->revenu_rules = $revenu_rules;
  }

  public function calculate($report) {
    $total = 0;
    foreach($this->revenu_rules->getRules() as $rule) {
      $total += $rule->applyOn($report);
    }

    return new NetTaxes($report->getName(), $total);
  }

}
