<?php

class BaseIncomesRule implements Rule {

  public function applyOn($report) {
    return $report->getLineAsInteger(134);
  }

}
