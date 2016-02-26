<?php

class ReeeExpensesRules implements Rule {

  public function applyOn($report) {
    return -$report->getLineAsInteger(101) / 2;
  }

}
