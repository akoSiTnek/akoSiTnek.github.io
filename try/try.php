<?php
include_once('../classes/class.categorymanager.php');

$category_list = new Category();
$strlist = $category_list->list_category('expense');
$count = count($strlist);

// $q = 'a';
$q = $_GET['input'];
// echo $q."ok";

if (strlen($q)>0) {
  $hint = "";
  for ($i=0; $i <($count) ; $i++) {
    $item = $strlist[$i]->category_name;
    // $hint = $count;
    if (stristr($item,$q)) {
        if ($hint == "") {
          $hint = "<option value='$item'>";
        }
        else
        {
          $hint = $hint."<option value='$item'>";
        }
    }
  }
}

if ($hint=="")
{
  $result = '<option value="No catergory">';
}
else
{
  $result = $hint;
}

echo $result;
?>
