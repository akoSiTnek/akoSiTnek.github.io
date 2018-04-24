<?php
include_once('classDB.php');

class Category
{
  public $link;

  function __construct()
      {
        $db_connection = new dbConnection(); 
        $this->link = $db_connection->connect();
        return $this->link;
      }

  function insert_category($t_type,$category)
      {
        $query = $this->link->prepare("INSERT INTO category (t_type,category_name) VALUES (?, ?)");

        $values = array($t_type,$category);
        $query->execute($values);
        $counts = $query->rowCount();
        return $counts;
      }

  function list_category($type)
      {
        $query = $this->link->query("SELECT * FROM category where t_type = '$type'");

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

  function edit_category()
      {

      }

  function delete_category()
      {

      }

}

// $try = new Category();
// $ec = $try->list_category('expense');
// $a = count($ec);
// $x = 0;
// while ($x < $a) {
//   $category_items = array(
//     'category_name' => $ec[$x]->category_name
//   );
//
//   $x++;
//   echo json_encode($category_items);
// }
// echo count($ec);
// $a = 0;
// while ($a < $x) {
//
//   echo $ec['category_name'];
// }

// $x = count($try);
// echo $x;
// $i = 0;
// while ($i < $x) {
//
//   echo '<pre>', print_r($ec->category_name), '<pre>';
// }


?>
