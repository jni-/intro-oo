<?php

class StockIncomesRule implements Rule {

  public function applyOn($report) {
    return $report->getLineAsInteger(23);
  }

}
