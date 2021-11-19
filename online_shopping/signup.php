<?php

$cpswd = NULL ;
$pswd = NULL ;

if(isset($_GET["submit"]))
{

$name = $_GET["name"];
$username = $_GET["username"];
$email = $_GET["email"];
$pswd = $_GET["pswd"];
$cpswd = $_GET["cpswd"];
$phno = $_GET["phno"];
$gender = $_GET["gender"];
$address = $_GET["address"];

if ($cpswd == $pswd) 
{
  

$conn = mysqli_connect("localhost", "root", "","online_shopping");
if($conn == false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//echo "Connect Successfully";
//$dt = date('d/m/yy');
//$dt = '01/07/2020';
$qry = "Insert into users VALUES (NULL,'". $name ."','". $email."','".$username."','". $phno."','". $gender."','". $address."','". $pswd."')";

//echo $qry;

if(mysqli_query($conn, $qry))
{
    echo "ok";
  //echo "Records inserted successfully.";
  //$last_id = mysqli_insert_id($conn);
  //echo "Last Inserted id is : " . $last_id;
  
} 
else
{
    echo "ERROR: Could not able to execute $qry " . mysqli_error($conn);
}

mysqli_close($conn);

}
} 

else 
{
  //echo "Please enter correct password";
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Signup </title>
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
  background-image: url('https://free4kwallpapers.com/uploads/originals/2020/09/25/blue-and-brown-abstract-painting--wallpaper.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

.button {
  background-color: #A8A8A8;
  border: none;
  padding: 15px 32px;
  text-decoration: none;
  font-size: 16px;
  color: white;
}

</style>


<body background="#E0E0E0">

<center>
<font size="10%" color="#585858">SIGN UP</font>
</center>
  <br><br><br>

<?php  

echo "<center><div class = 'div1'>";
echo "<form action='' method='get'>";  

echo "<label>Full Name</label><br>";   
echo "<input type='text' name='name' placeholder='Enter your Name'><br>";    

echo "<label>Email</label><br>";    
echo "<input type='text' name='email' placeholder='Enter your email'><br>"; 

echo "<label>Username</label><br>";    
echo "<input type='text' name='username' placeholder='Enter your username'><br>"; 

echo "<label>Phone Number</label><br>";   
echo "<input type='text' name='phno' placeholder='Enter your Email'><br>";    

echo"<lable>Please select your gender:</lable><br>
  <input type='radio' id='male' name='gender' value='male'>
  <label for='male'>Male</label><br>
  <input type='radio' id='female' name='gender' value='female'>
  <label for='female'>Female</label><br>
  <input type='radio' id='other' name='gender' value='other'>
  <label for='other'>Other</label><br>";

echo "<label>Address</label><br>";   
echo "<input type='text' name='address' placeholder='Enter your address'><br>";

echo "<label>Password</label><br>";   
echo "<input type='text' name='pswd' placeholder='Enter your password'><br>"; 

echo "<label>Conform Password</label><br>";   
echo "<input type='text' name='cpswd' placeholder='Renter your password'><br>";        

echo "<input type='submit' name='submit' value='Submit'>";    
echo "</form>";  
echo "</div></center>";

?>

<br><br>

<center>
<div class = "div1">
<font size="5%" color="#585858">Already Have an Account ?</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button class="button">Login</button> 
</div>
</center>

</body>
</html>