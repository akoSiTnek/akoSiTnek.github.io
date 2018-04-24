<?php
include_once('library/insert_category.php');
include_once('static/header.php');
?>

<div id="mainContent">
  <?php
    if (isset($error))
    {
      echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    }

    if (isset($success))
    {
      echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
    }
  ?>
  <div id="head">
    <h2> Add Category</h2>
  </div>

  <div id="mainBody">
      <form class="form-group" action="add_category.php" method="post">
        <div class="form_field">
          <label for="category">Category Name</label>
          <input class="form-control" type="text" name="category" id="category" />
        </div>

        <div class="form-group">
          <label for="t_type">Transaction Type</label>
          <!-- <input class="form-control" type="text" name="category" id="category" /> -->
          <select class="form-control" name="t_type" id="t_type">
            <option value="">Select</option>
            <option value="income">Income</option>
            <option value="expense">Expense</option>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" name="insert_category" id="insert_category" class="btn btn-success form-control"/>
        </div>
      </form>
  </div>
</div>
