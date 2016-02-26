<?php

require_once("TaxesParser.php");
require_once("TaxesReport.php");

class CsvTaxesParser implements TaxesParser {

  private $reports = array();

  public function __construct($file_name) {
    $this->readFile($file_name);
  }

  private function readFile($file_name) {
    $lines = file($file_name, FILE_IGNORE_NEW_LINES);
    $taxes_report = null;
    foreach($lines as $line) {
      if($taxes_report == null) {
        $taxes_report = $this->readHeaderLine($line);
      } elseif($line == "") {
        $this->reports[] = $taxes_report;
        $taxes_report = null;
      } elseif($line[0] == "#") {
      } else {
        $this->readTaxesLine($line, $taxes_report);
      }
    }
  }

  private function readHeaderLine($line) {
      $first_line = explode(", ", $line);
      $name = $first_line[0];
      $birthday = new DateTime($first_line[1]);
      return new TaxesReport($name, $birthday);
  }

  private function readTaxesLine($line, $taxes_report) {
      $line_number = intval(substr($line, 5, 3));
      $line_value = substr($line, 10);
      $taxes_report->addLine($line_number, $line_value);
  }

  public function getAllReports() {
    return $this->reports;
  }
}

