<?php

 include_once('classes/class.categorymanager.php');

 $add = new Category();

 if (isset($_POST['insert_category']))
 {

   $t_type = $_POST['t_type'];
   $category = $_POST['category'];

   if (empty($category))
   {
     $error = 'Category name is required.';
   }
   else
   {
     $insert = $add->insert_category($t_type, $category);

   }

   if ($insert == 1)
   {
     $success = 'Category added'; 
   }
   else
   {
     $error = 'There was an error';
   }
 }

?>
