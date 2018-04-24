<?php

include_once('classes/class.transactionmanager.php');

$i = 'x';
$transaction = new Transaction();

if ($i = 'x') {

    $list_transactions = $transaction->list_transactions($i);

}

if (isset($_GET['date'])) {
  $date = $_GET['date'];

  $list_transactions = $transaction->list_transactions($date);
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $list_transactions = $transaction->list_transactions($id);
}




?>
