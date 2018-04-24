<?php

include_once('classDB.php');

class Transaction
{
  public $link;

  function __construct()
      {
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
      }

  function list_transactions($param)
  {

    $format = 'Y-m-d';
    $date = DateTime::createFromFormat($format,$param);

    if ($param === 'x') {
      $query = $this->link->query("SELECT * FROM transactions");

      $counts = $query->rowCount();
    }

    elseif($date == true)
    {
      $query = $this->link->query("SELECT * FROM transactions where date_stamp = '$param'");

      $counts = $query->rowCount();
    }
    else
    {
      $query = $this->link->query("SELECT * FROM transactions where id = '$param'");

      $counts = $query->rowCount();
    }


    if ($counts >= 1)
    {
      $result = $query->fetchAll();
    }
    else
    {
      $result = $counts;
    }
    return $result;

  }
  function insert_transaction($t_type,$category,$date,$amount)
  {
    $query = $this->link->prepare("INSERT INTO transactions (t_type,category,date_stamp,amount) VALUES (?, ?, ?, ?)");
    $values = array($t_type,$category,$date,$amount);
    $query->execute($values);
    $counts = $query->rowCount();
    return $counts;
  }

  function insert_transaction_type($param){
    $query = $this->link->prepare("INSERT INTO transaction_type (type) VALUES (?)");
    $values = array($param);
    $query->execute($values);
    $counts = $query->rowCount();
    return $counts;
  }

  function list_t_type() {
    $query = $this->link->query("SELECT * FROM transaction_type");
    $counts = $query->rowCount();

    if ($counts >= 1)
    {
      $query->setFetchMode(PDO::FETCH_OBJ);
      $result = $query->fetchAll();
    }
    else
    {
      $result = $counts;
    }
    return $result;
  }

  function edit_transaction($id, $t_type, $category, $date, $amount)
  {
    $query = $this->link->prepare("UPDATE transactions SET t_type = ?, category = ?, date_stamp = ?, amount = ? WHERE id = '$id'");
    $values = array($t_type, $category, $date, $amount);
    $query->execute($values);
    $counts = $query->rowCount();

    return $counts;
  }

  function delete_transactions($id)
  {
    $query = $this->link->query("DELETE FROM transactions where id = $id limit 1");
    $counts = $query->rowCount();
    return $counts;
  }
}
//
// $go = new Transaction();
// $try = $go->edit_transaction('1','Expense','Electric Bill','2018-02-15','1234');
// echo $try;
?>
