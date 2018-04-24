<?php
  include_once('static/header.php');
  include_once('library/list_category.php');

?>

<div class="" id="content_view">
  <h3>Categories</h3>

  <div id="" class="">
    <div class="">
      <a href="add_category.php" class="btn btn-success">+</a>
    </div>

      <ul class="topnav">
        <li class="active"> <a href="category.php?type=income">Income</a> </li>
        <li class="expense"> <a href="category.php?type=expense">Expense</a> </li>
      </ul>

      <div class="">

        <?php
          if ($list_category != 0) {
            foreach ($list_category as $key => $value)
            {
              echo $value->category_name."<br>";
            }
          }
        ?>


      </div>

  </div>
</div>
