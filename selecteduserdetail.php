<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<=0)
   {
        ?>
        <script type="text/javascript">
         alert("Minimum transaction should be Rs 1");  // showing an alert box.
        </script>
        <?php
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        ?>
        <script type="text/javascript">
     alert("Insufficient Balance transaction cannot be done");
        </script>
        <?php
    }
    


    
    


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($con,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($con,$sql);
                date_default_timezone_set('Asia/Kolkata');
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $my_date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO transaction(sender,receiver,balance,dtime) VALUES ('$sender','$receiver','$amount','$my_date')";
                $query=mysqli_query($con,$sql);

                if($query){
                     ?><script> 
                    alert('Transaction Successful');
                    window.location='transactionhistory.php';
                           </script>";
                           <?php
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="grid.css">
   <link rel="stylesheet" type="text/css" href="ionicons.min.css">
   <link rel="stylesheet" type="text/css" href="animate.css">
   <link rel="stylesheet" type="text/css" href="queries.css">
   

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./fontawesome-free-5.13.0-web/css/all.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://kit.fontawesome.com/a0941870c8.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
</head>

<body  background="img/indian-rupee.jpg" style="opacity:1.0;">
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
 


	<div class="container">
        <h2 class="text-center pt-4">TRANSACTION</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($con);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center" style="font-size:30px;"><b>Id</b></th>
                    <th class="text-center" style="font-size:30px;"><b>Name</b></th>
                    <th class="text-center" style="font-size:30px;"><b>Email</b></th>
                    <th class="text-center" style="font-size:30px;"><b>Balance</b></th>
                </tr>
                <tr>
                    <td class="py-2" style="font-size:25px;"><b><?php echo $rows['id'] ?></b></td>
                    <td class="py-2" style="font-size:25px;"><b><?php echo $rows['name'] ?></b></td>
                    <td class="py-2" style="font-size:25px;"><b><?php echo $rows['email'] ?></b></td>
                    <td class="py-2"style="font-size:25px;"><b><?php echo $rows['balance'] ?></b></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="font-size:25px;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="font-size:25px;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3 btn-dark btn-block" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>