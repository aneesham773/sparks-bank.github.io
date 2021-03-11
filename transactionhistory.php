<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="normalize.css">
   <link rel="stylesheet" type="text/css" href="grid.css">
   <link rel="stylesheet" type="text/css" href="ionicons.min.css">
   <link rel="stylesheet" type="text/css" href="animate.css">
   <link rel="stylesheet" type="text/css" href="queries.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body background="img/indian-rupee.jpg" style="opacity:1.0;">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php" style="color: white;"><b>SPARKS BANK</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="color: white;">
        <span class="navbar-toggler-icon" style="color: white;"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php" style="color: white;">HOME</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="transfermoney.php" style="color: white;">VIEW CUSTOMERS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transactionhistory.php" style="color: white;">CUSTOMER TRANSACTION HISTORY</a>
              </li>
          </div>
       </nav>


	<div class="container"  style="width:100%;overflow: auto;">
        <h2 class="text-center pt-4">Transaction History</h2>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table-hover table-condensed table-bordered"style="margin-left:auto;margin-right:auto;">
        <td>
            <tr>
                <th class="text-center"style="font-size:30px;"><b>S.No.</b></th>
                <th class="text-center" style="font-size:30px;"><b>Sender</b></th>
                <th class="text-center" style="font-size:30px;"><b>Receiver</b></th>
                <th class="text-center" style="font-size:30px;"><b>Amount</b></th>
                <th class="text-center" style="font-size:30px;"><b>Date & Time</b></th>
            </tr>
        </td>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($con, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-2" style="font-size:25px;"><b><?php echo $rows['sno']; ?></b></td>
            <td class="py-2" style="font-size:25px;"><b><?php echo $rows['sender']; ?></b></td>
            <td class="py-2"style="font-size:25px;"><b><?php echo $rows['receiver']; ?></b></td>
            <td class="py-2"style="font-size:25px;"><b><?php echo 'Rs.'.$rows['balance']; ?></b> </td>
            <td class="py-2" style="font-size:25px;"><b><?php echo $rows['dtime']; ?></b> </td>
                </tr>
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>