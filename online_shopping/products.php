<?php
session_start();
$conn = mysqli_connect("localhost", "root", "","online_shopping"); 

$pid = $_GET['pid'];

if(isset($_POST["submit"]))
{

$qry1 = "SELECT * from products where p_id = '$pid'";
$result1 = mysqli_query($conn,$qry1);
$row1 = mysqli_fetch_array($result1);
$price1 = $row1["p_price"];

//$pid = $_REQUEST['pid'];
  if($conn == false)
  {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  date_default_timezone_set('Asia/Kolkata');
  $dt = date("Y-m-d H:i:s");
  $uid = $_SESSION['user_id'];
  $qty = $_POST["quantity"];
  $total = $price1 * $qty;
  $qry1 = "Insert into order_header VALUES (NULL,'". $dt ."','". $uid."','".$total."','".$pid."','".$qty."')";

if(mysqli_query($conn, $qry1))
{
  echo "ok";
  echo $price1;
  echo $pid;
} 
else
{
    echo "ERROR: Could not able to execute $qry " . mysqli_error($conn);
}

}

?>


<!DOCTYPE html>
<html>
 <head>
 <title>Products</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  #a { 
            text-decoration: none; 
            color: #808080;
        } 

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #FFFFFF;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #505050;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

</style>

 </head>
<body style="background-color:#F8F8F8;">
<br><br><br>

<span class="button2" style='font-size:30px;cursor:pointer' onclick='openNav()'>&#9776; </span>
<div id='mySidenav' class='sidenav'>
  <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
  <br><br>
  <a href='sell_products.php'>Sell a product ?</a>
  <a href='cart.php'>Cart</a>
  <span style="font-size:20px">
  <a href='#'>About Us</a>
  </span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "270px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


<center>
  <?php  



$qry = "SELECT * from products where p_id = '$pid'";
$result = mysqli_query($conn,$qry);
$row = mysqli_fetch_array($result);
$image = $row["image"];
$price = $row["p_price"];
$name = $row["pname"];
$pdis = $row["p_discription"];
$pdate = $row["p_date"];

  ?>    
  <img class="button1" src="<?php echo $image; ?>" width="40%" height="400">
  <br><br><br>

  <?php 
  echo "Product Name : ";
  echo $name; 
  ?>
  <br>
  <?php 
  echo "Price : Rs ";
  echo $price; 
  ?>
  <br>
   <?php 
  echo $pdis; 
  ?>
  <br>
   <?php 
  echo "Manufactured Date : ";
  echo $pdate; 
  ?>

<br><br>

<form method="post">
  <label for="quantity"> Select Quantity : </label>
  <input type="number" name="quantity" min="1" max="100">
  <input type="submit" value="Submit" name="submit">
</form>

</center>

</body>
</html>