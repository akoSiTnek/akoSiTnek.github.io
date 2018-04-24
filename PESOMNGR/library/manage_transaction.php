<?php

include_once('classes/class.transactionmanager.php');

$add = new Transaction();

// $list_category = $category->list_category('expense');
// echo json_encode($list_category);

if (isset($_POST['insert_transaction'])) {

  $t_type = $_POST['t_type'];
  $category = $_POST['category'];
  $date = $_POST['date'];
  $amount = $_POST['amount'];

  if (empty($date) || empty($amount)) {

    $error = 'All fields are required.';
  }
  else
  {
    // $amount = strip_tags($amount);
    $t_type = strip_tags($t_type);
    $category = strip_tags($category);

    $insert = $add->insert_transaction($t_type,$category,$date,$amount);
  }

  if ($insert == 1)
  {
    $success = 'Transaction inserted';
  }
  else
  {
    $error = 'There was an error';
  }

  // header('location: index.php');
}

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $category = $_POST['cat'];
  $t_type = $_POST['type'];
  $amount = $_POST['amount'];
  $date = $_POST['date'];

  if (empty($category) && empty($amount) && empty($date)) {
    $error = 'All fields are required.';
  }
  else
  {
    $t_type = strip_tags($t_type);
    $category = strip_tags($category);

    $update = $add->edit_transaction($id, $t_type, $category, $date, $amount);

  }

  if ($update == 1)
  {
    $success = 'Changes saved';
    $result = $success;
  }
  else
  {
    $error = 'There was an error';
    $result = $error;
  }

  echo $result;
}




?>
