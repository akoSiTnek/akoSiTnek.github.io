<?php
include_once('classDB.php');

class Wallet
{
  public $link;

  function __construct()
      {
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
      }

  function sum($t_type)
  {
    $query = $this->link->query("SELECT sum(amount) as sum from transactions where t_type = '$t_type'");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $counts = $query->fetchAll();
    return $counts;
  }

  function difference()
  {
    $sum = new Wallet();
    $income = $sum->sum('Income');
    $sum_income = $income[0]->sum;

    $expense = $sum->sum('Expense');
    $sum_expense = $expense[0]->sum;

    if (isset($expense) & isset($income))
    {
      $result = $sum_income - $sum_expense;
    }
    return $result;
  }
}

// $eto = new Wallet();
// $etona = $eto->sum('Income');
// echo $etona[0]->sum;
?>
