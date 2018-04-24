<?php
include_once('classes/class.transactionmanager.php');
include_once('library/list_transaction.php');
include_once('static/header.php');

?>

<div class="pt-3 pb-3" id="content_view">
  <?php if ($list_transactions != 0)
      {
        foreach ($list_transactions as $key => $value) {
          $date = $value['date_stamp'];
        }

        if ($_GET['date'] === $date) {

          $date = new DateTime($date);
          echo '<div id="sc_item1">'.$date->format('M d, Y').'</div>';
        }
  ?>
    <div class="" id="sub_content">
      <div class="clearfix" id="subcon2"> <!-- subcon2 -->

        <?php
                  foreach ($list_transactions as $key => $value) {
                    echo "<div class='clearfix'><a href='transaction.php?id=".$value['id']."'><div id='sc_item2'>".$value['category']."</div>
                    <div id='sc_item3'>".number_format($value['amount'],2)."</div></a></div>";
                  }
                }
            ?>

      </div>
    </div>
</div>
