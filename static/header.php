<?php

include_once('classes/class.walletmanager.php');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PESO Diary</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/external.css" />
    <!-- <link rel="stylesheet" href="js/bootstrap.min.js"> -->
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>


  </head>
  <style>

  div #hdate {
    display: none;
  }

  </style>

  <body>

      <div class="container">
        <div class="row">
          <div class="jumbotron">
            <a href="pesomngr.php" id="logo">Peso Diary</a>
            <h6>Wallet: P

              <?php
              $sum = new Wallet();
              $difference = $sum->difference();
              echo number_format($difference,2);
              ?>

            </h6>
          </div>
        </div>
        <div class="row" id="">

            <div class="" id="sidenav">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="active nav-link" href="pesomngr.php">Transaction</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="debt.php">Debt</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="category.php?type=income">Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="report.php">Report</a>
                </li>
              </ul>
            </div>
