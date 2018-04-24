<?php

include_once('classes/class.categorymanager.php');

$category = new Category();

if (isset($_GET['type'])) {
  $type = $_GET['type'];

  $list_category = $category->list_category($type);
}



?>
