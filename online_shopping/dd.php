<?php
session_start(); 

$conn = mysqli_connect("localhost", "root", "","online_shopping"); 
$pid = $_GET['pid'];
$qry = "DELETE FROM order_header WHERE p_id ='$pid'";
mysqli_query($conn, $qry);
header("location:cart.php");
?>

<html>
<head>

</head>

<style>

</style>

<body style="background-color:#F8F8F8;">

</body>
</html>