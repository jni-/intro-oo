<?php
require_once("rules/Rule.php");
foreach(glob("rules/*.php") as $rule_file) {
  require_once($rule_file);
}

class RevenuRules {

  public function getRules() {
    return array(
      new BaseIncomesRule(),
      new StockIncomesRule(),
      new ChildrenExpensesRule(),
      new PublicTransportationExpensesRule(),
      new CharityExpensesRules(),
      new ReerExpensesRules(),
      new ReeeExpensesRules()
    );
  }

}
