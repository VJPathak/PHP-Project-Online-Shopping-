<?php
session_start(); 

$conn = mysqli_connect("localhost", "root", "","online_shopping"); 
$sum = 0;
?>

<html>
<head>

<title> Cart </title>
<link rel="icon" href="https://www.kindpng.com/picc/m/152-1522521_indian-rupee-symbol-1-indian-rupee-symbol-png.png" type="image/icon type">
</head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>

.button1:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

input[type=submit] {
  width: 15%;
  background-color: #A0A0A0;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #808080;
  color: black;
}

</style>

<body style="background-color:#F8F8F8;">

<br>

<center>
<table width="90%" bgcolor="#E8E8E8">
  <tr>
    <td width="50%" align="center">
      Image
    </td>
    <td align="center" width="13%">
      Name
    </td>
    <td align="center" width="13%">
      Quantity
    </td>
    <td align="center">
      Total-Price
    </td>
  </tr>
</table>
</center>

<br>

<center>
<table width="90%" bgcolor="#F5F5F5">
  
<?php
$qry = "SELECT * from order_header";
$result = mysqli_query($conn,$qry);

  while($row = mysqli_fetch_array($result))
    {
    $pid = $row["p_id"];
    $price = $row["total_amt"];
    $qty = $row["total_quantity"];

        $qry1 = "SELECT * from products where p_id = '$pid'";
        $result1 = mysqli_query($conn,$qry1);
        $row1 = mysqli_fetch_array($result1);
        $image = $row1["image"];
        $pname = $row1["pname"];

    ?>

  <tr>
    <td width="50%" align="center">
      <img class="button1" src="<?php echo $image; ?>" width="40%" height="270">
    </td>
    <td align="center" width="13%">
      <?php 
      echo $pname; 
      ?>
    </td>
    <td align="center" width="13%">
       <?php 
      echo $qty; 
      ?>
    </td>
    <td align="center">
       <?php 
      echo $price; 
      $sum = $sum + $price;
      ?>
&nbsp;&nbsp;
       <a name="product" href="dd.php?pid=<?php echo $pid ?>"><i class="material-icons">delete</i></a><br>

    </td>
  </tr>
  <?php 
    } 
  ?>
</table>
</center>

    <br><br>
    <center>
    <?php 
    echo "Total : "; 
    echo $sum;
    ?> 
    </center>

<br><br>
<center>
<form method="get"> 
<input type="submit" name="dt" value="Get Detailed Bill">    
</form> 
</center>

<?php  
if (isset($_GET['dt'])) 
{
  
  $uid = $_SESSION['user_id'];
  $qry2 = "SELECT * from users where user_id = '$uid'";
  $result2 = mysqli_query($conn,$qry2);
  $row2 = mysqli_fetch_array($result2);
  $name = $row2["name"];
  $email = $row2["email"];
  $address = $row2["address"];
  $phno = $row2["phno"];

?>

<center>
 
  <br><br>
  <h3>Detailed Bill</h3>
  <br>

  <table bgcolor="#F0F0F0">
    
    <tr>
     <td> Name : </td> 
     <td>
       <?php  
        echo $name;
       ?>
     </td>
    </tr>
    


    <tr>
      <td> Email : </td> 
     <td>
       <?php  
        echo $email;
       ?>
     </td>
    </tr>
    


    <tr>
     <td> Address : </td> 
     <td>
       <?php  
        echo $address;
       ?>
     </td> 
    </tr>
    


    <tr>
      <td> Phone Number : </td> 
     <td>
       <?php  
        echo $phno;
       ?>
     </td>
    </tr>



     <tr>
      <td> Grand Total : </td> 
     <td>
       <?php  
        echo $sum;
       ?>
     </td>
    </tr>

  </table>
</center>

<?php 
}
?>

</body>
</html>