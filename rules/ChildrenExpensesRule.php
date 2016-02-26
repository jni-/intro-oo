<?php

class ChildrenExpensesRule implements Rule {
  const AMOUNT_PER_CHILD = -500;

  public function applyOn($report) {
    return $report->getLineAsInteger(12) * self::AMOUNT_PER_CHILD;
  }

}
