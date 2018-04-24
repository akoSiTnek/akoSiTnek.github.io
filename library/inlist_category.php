<?php

include_once('../classes/class.categorymanager.php');

$category = new Category();

if (isset($_GET['t_type'])) {
  $type = $_GET['t_type'];

  $list_category = $category->list_category($type);
  // $list_category->category_name;
  $a = count($list_category);
  $x = 0;
  while ($x < $a) {
      echo '"<option value="'.$list_category[$x]->category_name.'">'.$list_category[$x]->category_name.'</option>"';
    $x++;
  }
}

if (isset($_GET['type']) & isset($_GET['key'])) {
  $type = $_GET['type'];
  $q = $_GET['key'];
  // $_GET['key'];

  $list_category = $category->list_category($type);
  $count = count($list_category);

  if (strlen($q) > 0) {
    $hint = "";
    for ($i=0; $i <($count) ; $i++) {
      $options = $list_category[$i]->category_name;
      // $hint = $count;
        if (is_string($q)) {
          if (stristr($options,$q)) {
              if ($hint == "") {
                $hint = "<option value='$options'>";
              }
              else
              {
                $hint = $hint."<option value='$options'>";
              }
          }
        }
    }
  }

  if ($hint== "")
  {
    $result = "<option value='No Catergory'>";
  }
  else
  {
    $result = $hint;
  }

  echo $result;

}

?>
