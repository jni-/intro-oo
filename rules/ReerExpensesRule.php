<?php

class ReerExpensesRules implements Rule {
  const MAX_AGE_REER = 65;

  public function applyOn($report) {

    if($report->calculateAgeInYears() < self::MAX_AGE_REER) {
      return -$report->getLineAsInteger(99);
    }

    return 0;
  }

}
