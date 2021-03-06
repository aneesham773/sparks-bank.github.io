<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
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

    
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="stylesheet" type="text/css" href="css/table.css">

    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }
    </style>
</head>

<body background="img/indian-rupee.jpg" style="opacity:1.0; width: auto;">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="width:100%;margin-left:auto;margin-right:auto;">
      <a class="navbar-brand" href="index.php" style="color: white;"><b>SPARKS BANK</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="color: white;" style="width: auto;margin-left:auto;margin-right:auto;">
        <span class="navbar-toggler-icon" style="color: white;"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar"style="width:auto;margin-left:auto;margin-right:auto;">
            <ul class="navbar-nav ml-auto"style="overflow: hidden;margin: 0;padding: 0;">
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
     </header>
<?php
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con,$sql);
?>



<div class="container" style="width:100%;overflow: auto;">
        <h2 class="text-center pt-4">OUR CUSTOMERS</h2>
        <br>
            
                    <div class="table-responsive-sm">
                    <table class="table-hover table-condensed table-bordered"style="margin-left:auto;margin-right:auto;width: auto;">
                        <td>
                            <tr>
                            <td scope="col" class="text-center py-2" style="font-size:30px;"><b>Id</b></td>
                            <th scope="col" class="text-center py-2"style="font-size:30px;"><b>Name</b></td>
                            <th scope="col" class="text-center py-2"style="font-size:30px;"><b>E-Mail</b></td>
                            <th scope="col" class="text-center py-2"style="font-size:30px;"><b>Balance</b></td>
                            <th scope="col" class="text-center py-2"style="font-size:30px;"><b>Operation</b></td>
                            </tr>
                        </td>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="py-2" style="font-size:25px;"><b><?php echo $rows['id'] ?></b></td>
                        <td class="py-2" style="font-size:25px;"><b><?php echo $rows['name']?></b></td>
                        <td class="py-2" style="font-size:25px;"><b><?php echo $rows['email']?></b></td>
                        <td class="py-2" style="font-size:25px;"><b><?php echo $rows['balance']?></b></td>
                        <td style="font-size:25px;"><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn btn-dark btn-block">Transact</button></a>
                        </td> 
                    </tr>
             <?php  
           }?>
           
           

            
                        </tbody>
                    </table>
                    </div>
                
         
         
  </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

</body>
</html>