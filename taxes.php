<?php

require_once("CsvTaxesParser.php");
require_once("RevenuRules.php");
require_once("NetRevenuCalculator.php");

$file_parser = new CsvTaxesParser("taxes.csv");
$revenu_rules = new RevenuRules();
$revenu_calculator = new NetRevenuCalculator($revenu_rules);

foreach($file_parser->getAllReports() as $report) {
  $net_taxes = $revenu_calculator->calculate($report);
  $net_taxes->display();
}

