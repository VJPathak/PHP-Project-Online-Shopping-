
<?php  
session_start();
if(isset($_GET["logout"]))
{
session_destroy();
$_SESSION["Name"]=NULL;
header("location:login.php");
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "","online_shopping");
if($conn == false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
                                          
<head>

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>
		  ONLINE SHOPPING WEBSITE
	</title>

  <style>
    
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700,900');

.search__input {
        width: 50%;
        padding: 12px 24px;
        background-color: transparent;
        transition: transform 250ms ease-in-out;
        font-size: 14px;
        line-height: 18px;
         
        color: #575756;
        background-color: transparent;
     background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-size: 18px 18px;
        background-position: 95% center;
        border-radius: 50px;
        border: 1px solid #575756;
        transition: all 250ms ease-in-out;
        backface-visibility: hidden;
        transform-style: preserve-3d;
    }

.search__input::placeholder {
            color: rgba(87, 87, 86, 0.8);
            letter-spacing: 2px;
            text-align: center;
        }

.search__input:hover,
        .search__input:focus {
            padding: 12px 0;
            outline: 0;
            border: 1px solid transparent;
            border-bottom: 1px solid #575756;
            border-radius: 0;
            background-position: 100% center;
        }
    
.button {
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  background-color: white;
}
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

input[type=submit]{
  background-color: white;
  /*font-weight: bold;*/
  font-size: 1.0em;;
  border: none;
  color: #808080;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
.button1:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

.div3 {
  width: 70%;
  height: 250px;
  background-color :#f4f0f5; 
}

.mySlides {display: none}
.mySlides1 {display: none}
.mySlides2 {display: none}
.mySlides3 {display: none}
.mySlides4 {display: none}

.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: grey;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.prev:hover, .next:hover {
  
}

.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

.button11 {
  background-color: blue;
  border: none;
  color: white;
  text-decoration: none;
}

a:link {
  text-decoration: none;
}

</style>

</head>

<body style="background-color:#F8F8F8;">
  <br>

<table width="100%">
  <tr><td width="5%">
<span class="button2" style='font-size:30px;cursor:pointer' onclick='openNav()'>&#9776; </span>
</td><td width="75%" align="center">
<div class="search__container">
    <input class="search__input" type="text" placeholder="Search Products" autocomplete="on"></center> 
</div>
</td>


<?php 

if (isset($_SESSION['Name'])) 
{
echo '<td align ="left"><span style="font-size: 22px; color:#808080">Welcome</span>&nbsp;&nbsp;';
echo '<span style="font-size: 22px; color:#808080">'  .$_SESSION['Name'] . '</span>';
echo"</td></tr></table>";
}

else
{
echo"<td width='15%'><div align='right'><button class='button button1'><a id = 'a' href = 'signup.php'><b>Signup</b></a></button>"; 
echo"<button class='button button1'><a id = 'a' href = 'login.php'><b>LogIn</b></a></button></div></td></tr>
</table>"; 
}
?>

<div id='mySidenav' class='sidenav'>
  <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
  <br><br>
  <a href='sell_products.php'>Sell a product ?</a>
  <a href='cart.php'>Cart</a>
  <span style="font-size:20px">
  <a href='#'>About Us</a>
  <form action='' method='get'>
  <input class='button1' type='submit' value='LOGOUT' name='logout'>
  </form>
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

<br><br><br><br>
<center>
<table width="90%" bgcolor="white">
<tr>
    <td align="right" width="30%">
     
      <div class="div3 button1" align="center"><br><br><br><br><br><span style="font-size: 35px; color:#808080">Visual Arts</span></div>
    </td>     
    <td>
      <br>
      <div class="slideshow-container">
<?php
$qry = "SELECT * from products where sub_id in (1,2,3)";
$result = mysqli_query($conn,$qry);
$i = 1;

    while($row = mysqli_fetch_array($result))
    {

    $image = $row["image"];
    $price = $row["p_price"];
    $name = $row["pname"];
    $pid = $row["p_id"];
    ?>
      <center>
      <div class="mySlides fade">
      <img class="button1" src="<?php echo $image; ?>" width="40%" height="270"><br>
      <a name="product" href="products.php?pid=<?php echo $pid ?>">
  <?php 

  echo "Product Name : ";
  echo $name; 
  ?>
  <br>
  <?php 
  echo "Price : Rs";
  echo $price; 
  ?>
  <br>
 </a><br>
</div>
 <?php 
    //echo "<br>";

    }
 ?>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="next" onclick="plusSlides(1)">&#10095;</a>

      </center>
      </div>
    </td>
</tr>
  
<tr>
    
    <td align="right" width="30%">
      <div class="div3 button1" align="center"><br><br><br><br><br><span style="font-size: 35px; color:#808080">Graphic Arts</span></div>
    </td>     
    <td>
      <br>
      <div class="slideshow-container">
<?php
$qry1 = "SELECT * from products where sub_id in (4,5,6)";
$result1 = mysqli_query($conn,$qry1);

    while($row1 = mysqli_fetch_array($result1))
    {
    $image1 = $row1["image"];
    $price1 = $row1["p_price"];
    $name1 = $row1["pname"];
    $pid1 = $row1["p_id"];
    ?>
      <center>
      <div class="mySlides1 fade">
      <img class="button1" src="<?php echo $image1; ?>" width="40%" height="270"><br>
  <?php 
  echo "Product Name : ";
  echo $name1; 
  ?>
  <br>
  <?php 
  echo "Price : ";
  echo $price1; ?>
  <br>
  <a name="product" href="products.php?pid=<?php echo $pid1 ?>">select</a><br>
</div>
 <?php 
    //echo "<br>";
    }
 ?>
<a class="prev" onclick="plusSlides1(-1)">&#10094;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="next" onclick="plusSlides1(1)">&#10095;</a>

      </center>
      </div>
    </td>
</tr>

<tr>
    
    <td align="right" width="30%">
      <div class="div3 button1" align="center"><br><br><br><br><br><span style="font-size: 35px; color:#808080">Plastic Arts</span></div>
    </td>     
    <td>
      <br>
      <div class="slideshow-container">
<?php
$qry2 = "SELECT * from products where sub_id in (7,8)";
$result2 = mysqli_query($conn,$qry2);

    while($row2 = mysqli_fetch_array($result2))
    {
    $image2 = $row2["image"];
    $price2 = $row2["p_price"];
    $name2 = $row2["pname"];
    $pid2 = $row2["p_id"];
    ?>
      <center>
      <div class="mySlides2 fade">
      <img class="button1" src="<?php echo $image2; ?>" width="40%" height="270"><br>
  <?php 
  echo "Product Name : ";
  echo $name2; 
  ?>
  <br>
  <?php 
  echo "Price : ";
  echo $price2; ?>
  <br>
  <a name="product" href="products.php?pid=<?php echo $pid2 ?>">select</a><br>
</div>
 <?php 
    //echo "<br>";
    }
 ?>
<a class="prev" onclick="plusSlides2(-1)">&#10094;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="next" onclick="plusSlides2(1)">&#10095;</a>

      </center>
      </div>
    </td>
</tr>
<tr>
    
    <td align="right" width="30%">
      <div class="div3 button1" align="center"><br><br><br><br><br><span style="font-size: 35px; color:#808080">Decoration Arts</span></div>
    </td>     
    <td>
      <br>
      <div class="slideshow-container">
<?php
$qry3 = "SELECT * from products where sub_id in (9,10,11)";
$result3 = mysqli_query($conn,$qry3);

    while($row3 = mysqli_fetch_array($result3))
    {
    $image3 = $row3["image"];
    $price3 = $row3["p_price"];
    $name3 = $row3["pname"];
    $pid3 = $row3["p_id"];
    ?>
      <center>
      <div class="mySlides3 fade">
      <img class="button1" src="<?php echo $image3; ?>" width="40%" height="270"><br>
  <?php 
  echo "Product Name : ";
  echo $name3; 
  ?>
  <br>
  <?php 
  echo "Price : ";
  echo $price3; ?>
  <br>
  <a name="product" href="products.php?pid=<?php echo $pid3 ?>">select</a><br>
</div>
 <?php 
    //echo "<br>";
    }
 ?>
<a class="prev" onclick="plusSlides3(-1)">&#10094;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="next" onclick="plusSlides3(1)">&#10095;</a>

      </center>
      </div>
    </td>
</tr>

<tr>
    
    <td align="right" width="30%">
      <div class="div3 button1" align="center"><br><br><br><br><br><span style="font-size: 35px; color:#808080">Traditional Arts</span></div>
    </td>     
    <td>
      <br>
      <div class="slideshow-container">
<?php
$qry4 = "SELECT * from products where sub_id = 12";
$result4 = mysqli_query($conn,$qry4);

    while($row4 = mysqli_fetch_array($result4))
    {
    $image4 = $row4["image"];
    $price4 = $row4["p_price"];
    $name4 = $row4["pname"];
    $pid4 = $row4["p_id"];
    ?>
      <center>
      <div class="mySlides4 fade">
      <img class="button1" src="<?php echo $image4; ?>" width="40%" height="270"><br>
  <?php 
  echo "Product Name : ";
  echo $name4; 
  ?>
  <br>
  <?php 
  echo "Price : ";
  echo $price4; ?>
  <br>
  <a name="product" href="products.php?pid=<?php echo $pid4 ?>">select</a><br>
</div>
 <?php 
    //echo "<br>";
    }
 ?>
<a class="prev" onclick="plusSlides4(-1)">&#10094;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="next" onclick="plusSlides4(1)">&#10095;</a>

      </center>
      </div>
    </td>
</tr>
</table>
</center>


<script>

var slideIndex = 1;

showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }

  slides[slideIndex-1].style.display = "block";  

}



var slideIndex1 = 1;

showSlides1(slideIndex1);

function plusSlides1(n1) {
  showSlides1(slideIndex1 += n1);
}

function currentSlide1(n1) {
  showSlides1(slideIndex1 = n1);
}

function showSlides1(n1) {
  var i;
  var slides1 = document.getElementsByClassName("mySlides1");

  if (n1 > slides1.length) {slideIndex1 = 1}    
  if (n1 < 1) {slideIndex1 = slides1.length}
  for (i = 0; i < slides1.length; i++) {
      slides1[i].style.display = "none";  
  }
  
  slides1[slideIndex1-1].style.display = "block";  

}




var slideIndex2 = 1;

showSlides2(slideIndex2);

function plusSlides2(n2) {
  showSlides2(slideIndex2 += n2);
}

function currentSlide2(n2) {
  showSlides2(slideIndex2 = n2);
}

function showSlides2(n2) {
  var i;
  var slides2 = document.getElementsByClassName("mySlides2");

  if (n2 > slides2.length) {slideIndex2 = 1}    
  if (n2 < 1) {slideIndex2 = slides2.length}
  for (i = 0; i < slides2.length; i++) {
      slides2[i].style.display = "none";  
  }
  
  slides2[slideIndex2-1].style.display = "block";  

}




var slideIndex3 = 1;

showSlides3(slideIndex3);

function plusSlides3(n3) {
  showSlides3(slideIndex3 += n3);
}

function currentSlide3(n3) {
  showSlides3(slideIndex3 = n3);
}

function showSlides3(n3) {
  var i;
  var slides3 = document.getElementsByClassName("mySlides3");

  if (n3 > slides3.length) {slideIndex3 = 1}    
  if (n3 < 1) {slideIndex3 = slides3.length}
  for (i = 0; i < slides3.length; i++) {
      slides3[i].style.display = "none";  
  }
  
  slides3[slideIndex3-1].style.display = "block";  

}


var slideIndex4 = 1;

showSlides4(slideIndex4);

function plusSlides4(n4) {
  showSlides4(slideIndex4 += n4);
}

function currentSlide4(n4) {
  showSlides1(slideIndex4 = n4);
}

function showSlides4(n4) {
  var i;
  var slides4 = document.getElementsByClassName("mySlides4");

  if (n4 > slides4.length) {slideIndex4 = 1}    
  if (n4 < 1) {slideIndex4 = slides4.length}
  for (i = 0; i < slides4.length; i++) {
      slides4[i].style.display = "none";  
  }
  
  slides4[slideIndex4-1].style.display = "block";  

}

</script>

</body>

</html>

