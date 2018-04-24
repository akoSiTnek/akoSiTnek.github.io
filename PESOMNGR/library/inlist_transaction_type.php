<?php
include_once('../classes/class.transactionmanager.php');

$transaction = new Transaction();

if (isset($_GET['type'])) {
  $type = array(strtolower($_GET['type']));

  $list_transaction_type = $transaction->list_t_type();
  $count = count($list_transaction_type);

  for ($i=0; $i < $count; $i++) {
    $types[] = $list_transaction_type[$i]->type;
  }

  for ($i=0; $i < $count ; $i++) {
    if ($types[$i] != $type[0]) {
      // $options = $types[$i];
       echo $options = "<option value=".ucfirst($types[$i])." >".ucfirst($types[$i])."</option>";

    }

  }

}

?>
