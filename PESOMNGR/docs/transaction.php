<?php
include_once('library/list_transaction.php');
include_once('static/header.php');

?>

<div class="pt-3 pb-3" id="content_view">

    <div class="" id="sub_content">

      <div class="clearfix" id="subcon2"> <!-- subcon2 -->

        <?php
          $selectedid = $_GET['id'];
          foreach ($list_transactions as $key => $value)
            {
                $id = $value['id'];
                if ($id = $selectedid)
                {
                  $category = $value['category'];
                  $date = $value['date_stamp'];
                  $amount = $value['amount'];
                  $type = $value['t_type'];
                }
            }
            ?>
            <div class='clearfix'>

                  <div class="" id="" style="float: right;">
                    <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                  </div>

                  <div class="pr-2" id='' style="float: right">
                    <button id="edit" class="btn btn-success" type="submit" name="edit" onclick='edit_transaction(<?php echo $value['id']; ?>);'>Edit</button>
                  </div>

                <div id='category' class="pt-2 pb-2 pl-3"> <?php echo $category; ?> </div>
                <datalist id="result"></datalist>
                <div id='type' class="pt-2 pb-2 pl-5" ><?php echo ucfirst($type); ?></div>
                <div  class="pt-2 pb-2 pl-5">P <span id='amount'><?php echo $amount; ?></span> </div>
                <div id='date' class="pt-2 pb-2 pl-5">
                    <?php
                        $date = new DateTime($date);
                        echo $date->format('Y-m-d');
                    ?>
                </div>
                <div id='' class="pt-2 pb-2 pl-5">Wallet</div>

            </div>

      </div>

      </div>
    </div>
</div>

<script type="text/javascript">
// onkeyup='search(this.value)'

  function edit_transaction(id){
    var cat = $("#category").text();
    var type = $("#type").text();
    var amount = $("#amount").text();
    var date = $("#date").text();

    $("#category").replaceWith("<input list='result' id='category' value='' />");
    $("#category").attr('value',$.trim(cat));

    $("#type").replaceWith("<select class='form-control' name='t_type' id='t_type'></select>");
    $("#t_type").prepend("<option value="+type+" >"+type+"</option>");
    $("#t_type").ready(function(){

      $.ajax({
        url: 'library/inlist_transaction_type.php',
        method: 'GET',
        dataType: 'text',
        data:{
          type: type
        }, success: function(response){

          $("#t_type").append(response);
        }
      })
    });

    $("#amount").replaceWith("<input type='text' id='amount' value="+amount+" />");

    $("#date").replaceWith("<input type='date' id='date' value="+date+" />");

    $("#edit").text("Save Changes").attr("onclick",'save_changes(<?php echo $value['id']; ?>)');

  }

  function save_changes(id){
    var cat = $("#category").val();
    var type = $("#t_type option:selected").text()
    var amount = $("#amount").val();
    var date = $("#date").val();

    $.ajax({
      url: 'library/manage_transaction.php',
      method: 'POST',
      dataType: 'text',
      data:
        {
          id: id,
          cat: cat,
          type: type,
          amount: amount,
          date: date
        }, success: function(response){
          if (response = 'Changes saved') {
              $("#sub_content").prepend("<div id='success' class='alert alert-success' role='alert' >"+response+"</div>");
          }
          else
          {
            $("#sub_content").prepend("<div id='error' class='alert alert-danger' role='alert'>"+response+"</div>");
          }

        }
    });

  }


  $("#category").keyup(

  function (){

    var cat = $("#category").val();
    var type = $("#type").text().toLowerCase();
    $("#edit").text("Save");

    if(str.length==0){
       $("#livesearch").text();
      return;
    }

    if (document.readyState = 'complete')
    {
      $.ajax({
        url: 'library/inlist_category.php',
        method: 'GET',
        dataType: 'text',
        data:
          {
            type: type,
            key: cat
          }, success: function(response){

            $("#result").append(response);
          }
      });
    }
  });


</script>
