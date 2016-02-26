<?php

$lines = file("taxes.csv", FILE_IGNORE_NEW_LINES);
$name = null;
$age = null;
$incomes = 0;
$expenses = 0;

$now = new DateTime();

foreach($lines as $line) {
  if($name == null) {
    $first_line = explode(", ", $line);
    $name = $first_line[0];
    $age = $now->diff(new DateTime($first_line[1]))->y;
  } elseif($line == "") {
    echo "Net value for " . $name . " is " . ($incomes - $expenses) . "$\n";
    $name = null;
    $incomes = 0;
    $expenses = 0;
  } elseif($line[0] == "#") {
  } else {
    $line_number = intval(substr($line, 5, 3));
    $line_value = substr($line, 10);

    switch($line_number) {
    case 134:
      $incomes += intval($line_value);
      break;
    case 12:
      $expenses += intval($line_value) * 500;
      break;
    case 23:
      $incomes += intval($line_value);
      break;
    case 87:
      if(in_array($line_value, array("Y", "y", "yes"))) {
        $expenses += 80;
      }
      break;
    case 98:
      $expenses += intval($line_value);
      break;
    case 99:
      if($age < 65) {
        $expenses += intval($line_value);
      }
      break;
    case 101:
      $expenses += intval($line_value) / 2;
      break;
    default:
      echo "Unknown line " . $line_number;
    }
  }
}
