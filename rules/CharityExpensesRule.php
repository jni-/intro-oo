<?php

class CharityExpensesRules implements Rule {

  public function applyOn($report) {
    return -$report->getLineAsInteger(98);
  }

}
