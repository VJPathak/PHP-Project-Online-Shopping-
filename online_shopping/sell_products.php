<?php
session_start(); 

  $conn = mysqli_connect("localhost", "root", "","online_shopping");
  
  if($conn == false)
  {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  
  $uid = $_SESSION['user_id'];
  $qry1 = "SELECT * FROM seller WHERE user_id = '$uid'";
  $result1 = mysqli_query($conn,$qry1);
  $row1 = mysqli_fetch_array($result1);
  $s_id = $row1["s_id"];
  $count = mysqli_num_rows($result1);

if (isset($_GET['submit1'])) 
{
   $uid = $_SESSION['user_id'];
   $qry11 = "insert into seller VALUES (NULL,'". $uid ."')";
if(mysqli_query($conn, $qry11))
{
    echo "U have regestered as seller";
    header("location:homepage.php");
} 
else
{
    echo "1ERROR: Could not able to execute $qry " . mysqli_error($conn);
}
   }


if (isset($_POST['submit'])) 
{
    $dt1=date("Y-m-d");
    $sname = $_POST["sub_name"];
    $pname = $_POST["pname"];
    $pdis = $_POST["pdis"];
    $pprice = $_POST["pprice"];

$filepath = "image/".$_FILES["file"]["name"];

    $qry3 = "select * from sub_category where sub_name = '$sname'";
    $result3 = mysqli_query($conn,$qry3);
    $row3 = mysqli_fetch_array($result3);
    $sub_id = $row3["sub_id"];

    $qry = "insert into products VALUES (NULL,'". $pname ."','". $sub_id."','".$dt1."','". $pdis."','".$pprice."','".$s_id."','".$filepath."')";

    if(mysqli_query($conn, $qry))
{
    echo "Records inserted successfully.";
} 
else
{
    echo "1ERROR: Could not able to execute $qry " . mysqli_error($conn);
}

if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
    {
?>
    <img src="<?php echo $filepath; ?>" width="25%" height="250">
    <?php  
    } 
    else 
    {
    echo "Error...";
    }

}

?>

<html>
<head>
<title> Sell_Products </title>
</head>

<style>
 
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #808080;
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

.div1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 50%;
  opacity: 90%;
}
 
body {
  background-image: url('https://free4kwallpapers.com/uploads/originals/2020/05/11/gradient-wallpaper.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

</style>

<body>

<?php  

if ($count > 0) 
  {
    
  echo "<br><br><br><br><br><br><br><br><center>
<div class = 'div1'><form method='post' enctype='multipart/form-data'>

    <label> Select Category:</label><br>
    <select name='sub_name' id='sub_name'>
    <option value=0>-Select Category-</option>";
  
  $qry2 = 'select * from sub_category';
  $result2 = mysqli_query($conn,$qry2);
  
  while($row2 = mysqli_fetch_array($result2))
  {
     echo "<option name='".$row2["sub_id"]."'>" . $row2["sub_name"] .  "</option>";
  } 
  
  echo "</select><br>
    <label>Product Name</label><br>
    <input type='text' name='pname' placeholder='Enter Product Name'><br> 
    <label>Product Discription</label><br> 
    <input type='text' name='pdis' placeholder='Enter Product Discription'><br>
    <label>Product Price</label><br> 
    <input type='text' name='pprice' placeholder='Enter Product Price'><br>
    <label>Upload Image</label><br> 
    <input type='hidden' name='size' value='10000000'><br>
    <input type='file' name='file'><br>
    <input type='submit' name='submit' value='SUBMIT'>
    </form></div>
</center>";

  } 
  
  else 
  {
    echo "You have not registered as seller,upgrade to seller in one step";
    echo "<center><div class = 'div1'><form method='get'>
    <input type='submit' name='submit1' value='REGESTER ME AS SELLER'></form></div></center>";
  }
  
?>

</body>
</html>