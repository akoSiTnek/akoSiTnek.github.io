 <?php
include_once('static/header.php');
include_once('library/manage_transaction.php');

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
    <h2> Add Transcation</h2>
  </div>

  <div id="mainBody">
      <form class="form-group" action="add_transaction.php" method="post">
        <div class="form_field">
          <label for="Title">Transaction Type</label>
          <!-- <input class="form-control" type="text" name="t_type" id="type" /> -->
          <select class="form-control" name="t_type" id="t_type">
            <option selected="selected" value="income">Income</option>
            <option value="expense">Expense</option>
          </select>
        </div>

        <div class="form-group">
          <label for="category">Category</label>
          <!-- <input class="form-control" type="text" name="category" id="category" /> -->
          <select class="form-control" name="category" id="category">

          </select>
        </div>

        <div class="form-group">
          <label for="DueDate">Date</label>
          <input class="form-control" type="date" name="date" id="date" />
        </div>

        <div class="form-group">
          <label for="Amount">Amount</label>
          <input class="form-control" type="text" name="amount">
        </div>

        <div class="form-group">
          <input type="submit" name="insert_transaction" id="insert_transaction" class="btn btn-success form-control"/>
        </div>
      </form>
  </div>
</div>

<script  type="text/javascript"> // src="js/insert_transaction.js"

$(document).ready(function(){
    var sel = $("select option:selected").val();
    if (sel = 'income') {

          $( "select option:selected" ).each(function() {
            str = $( this ).val();
            $.ajax({
              url: 'library/inlist_category.php',
              method: 'GET',
              dataType: 'text',
              data:
                {
                  t_type: str
                }, success: function(response){
                  console.log(response);
                  $("#category").html(response);
                }
            })
          });

    }
});

$("#t_type").change(function() {
    var sel = $("select option:selected").val();
    $( "select option:selected" ).each(function() {

      $.ajax({
        url: 'library/inlist_category.php',
        method: 'GET',
        dataType: 'text',
        data:
          {
            t_type: sel
          }, success: function(response){
            console.log(response);
            $("#category").html(response);
          }
      })
    });
  });



</script>
