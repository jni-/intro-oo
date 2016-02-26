<?php

class PublicTransportationExpensesRule implements Rule {
  const EXPENSES_AMOUNT = -80;

  public function applyOn($report) {
    if(in_array($report->getLine(87), array("Y", "y", "yes"))) {
      return self::EXPENSES_AMOUNT;
    }

    return 0;
  }

}
