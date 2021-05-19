<?php

session_start();
include('db.php');

if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$name=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($name,$array_keys)) {

    
	}else {
		$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	}
	}
}
?>
<html>

<head>
    <title>COOKIES SHOP</title>
    <link rel='stylesheet' href='styl.css' />
</head>

<body>
	<!-- <div style="width:700px; margin:50 auto;"> -->
	<br><br><h1>COOKIES SHOP</h1><br><br>

	<div class="bar_div">
        <li><a class="active" onclick="parent.location.href='index.php'">หน้าหลัก</a></li>
        <li><a onclick="parent.location.href='add.php'">เพิ่มสินค้าใหม่</a></li>
        <li><a onclick="parent.location.href='cart.php'">ตะกร้าสินค้า</a></li>
        
    </div>

        <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
        <div class="cart_div">
            <a href="cart.php" class="cart_icon" ><img src="cart-icon-circle.png" /><span><?php echo $cart_count; ?></span></a>
        </div>
        <?php
}else{
    ?>
        <div class="cart_div">
            <a href="cart.php" class="cart_icon"><img src="cart-icon-circle.png" /></a>
        </div>

        <?php
    }

$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='".$row['image']."' /></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>".$row['price']." บาท</div>
			  <button type='submit' class='buy'>เพิ่มในตะกร้า</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);


?>
    </div>

</body>

</html>