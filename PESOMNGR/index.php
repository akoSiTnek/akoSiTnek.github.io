<?php
  include_once('library/list_transaction.php');
  include_once('static/header.php');
?>

            <div class="pt-3 pb-3" id="content_view">
              <h3>TRANSACTIONS</h3>

              <a href="add_transaction.php" class="btn btn-success">+</a>

              <div class="" id="sub_content">
                  <div class="" id="sum">
                    <h5>Summary</h5>

                        <div class="clearfix" id="income">
                          <h6>Income</h6>
                          <h5>P

                            <?php
                              $income = new Wallet();
                              $sum = $income->sum('Income');
                              echo number_format($sum[0]->sum,2);
                            ?>

                          </h5>
                        </div>

                        <div class="clearfix" id="expense">

                            <h6>Expense</h6>
                            <h5>P
                                <?php
                                $expense = new Wallet();
                                $sum = $expense->sum('Expense');
                                echo number_format($sum[0]->sum,2);
                                ?>
                            </h5>

                        </div>
                        <div class="clearfix" id="total"> <!-- difference -->
                            <h6></h6>
                            <h4>P
                              <?php
                              $sum = new Wallet();
                              $difference = $sum->difference();
                              echo number_format($difference,2);
                              ?>
                            </h4>

                        </div>
                  </div>


                    <?php
                      if ($list_transactions != 0)
                      {
                        foreach ($list_transactions as $key => $value) {
                          $date_list[] = $value['date_stamp'];

                        }

                            $remove_duplicate = array_unique($date_list);
                            // $tostring = implode($remove_duplicate);
                            foreach ($remove_duplicate as $key => $dates)
                                {
                                  echo "<a href='transactionperdate.php?date=".$dates."'>";
                      ?>

                                      <div class="clearfix" id="subcon2">
                          <?php
                                      $date = new DateTime($dates);

                                      echo '<div id="sc_item1">'.$date->format('M d, Y').'</div>';
                                      foreach ($list_transactions as $key => $value)
                                      {

                                        if ( $value['date_stamp'] == $dates)
                                        {

                            ?>

                                            <div class="clearfix">
                                                <?php
                                                  if ($value['t_type'] == 'Expense') {
                                                    echo "<div id='sc_item2' style='color: #e62e00;'>".$value['category']."</div>"; //displays category name in RED color

                                                    echo "<div id='sc_item3' style='color: #e62e00;'>".$value['amount']."</div>"; //displays amount in RED color
                                                  }
                                                  elseif ($value['t_type'] == 'Income') {
                                                    echo "<div id='sc_item2' style='color: blue;'>".$value['category']."</div>"; //displays category name in BLUE color

                                                    echo "<div id='sc_item3' style='color: blue;'>".$value['amount']."</div>"; //displays $amountin BLUE color
                                                  }

                                                ?>
                                            </div>
                          <?php
                                        }
                                      }
                                      ?>
                                </div>
                                    </a>
                              <?php
                            }
                    }
                        ?>

              </div>

            </div>

            <div class="" id="user_info">
              <div class="">
                <h4>Account</h4>

              </div>
            </div>

        </div>

    </div>

  </body>
</html>
