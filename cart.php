<?php
session_start();
// session_destroy();
if (isset($_POST['action']) && $_POST['action']=="remove"){
	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $key => $value) {
			if($value['code'] === $_POST["code"]){
				unset($_SESSION["shopping_cart"][$key]);
			}
			if(empty($_SESSION["shopping_cart"]))
				unset($_SESSION["shopping_cart"]);	
                	
		}
	}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  	foreach($_SESSION["shopping_cart"] as &$value){
    	if($value['code'] === $_POST["code"]){
        	$value['quantity'] = $_POST["quantity"];
        	break; 
    	}
	}	
}


?>
<html>

<head>
<title>COOKIES SHOP</title>
    <link rel='stylesheet' href='style.css' />
</head>

<body>
	<!-- <div style="width:700px; margin:50 auto;"> -->
	<br><br><h1>COOKIES SHOP</h1><br><br>

        <div class="bar_div">
            <li><a onclick="parent.location.href='index.php'">หน้าหลัก</a></li>
            <li><a onclick="parent.location.href='add.php'">เพิ่มสินค้าใหม่</a></li>
            <li><a class="active" onclick="parent.location.href='cart.php'">ตะกร้าสินค้า</a></li>


        </div>

        <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
        <div class="cart_div">
            <a href="cart.php"class="cart_icon" ><img src="cart-icon-circle.png" />
                <span><?php echo $cart_count; ?></span></a>
        </div>
        <?php
}else{
    ?>
        <div class="cart_div">
            <a href="cart.php" class="cart_icon"><img src="cart-icon-circle.png" /></a>
        </div>

        <?php
    }
?>

        <div class="cart">
            <?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
	$net_amount = 0;
	
?>
            <table class="table">
                <tbody>
                    <tr>
                        <td></td>
                        <td>ชื่อสินค้า</td>
                        <td>จำนวน</td>
                        <td>ราคาต่อหน่วย</td>
                        <td>ราคาทั้งหมด</td>
                        <td>ส่วนลด</td>
                    </tr>
                    <?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
                    <tr>
                        <td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
                        <td><?php echo $product["name"]; ?><br />
                            <form method='post' action=''>
                                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                <input type='hidden' name='action' value="remove" />
                                <button type='submit' class='remove'>ลบ</button>
                            </form>
                        </td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                <input type='hidden' name='action' value="change" /><br><br>
                                <input type="number" id="quantity" name="quantity" min="1" max="99" value="<?php echo $product["quantity"]; ?>" onchange="this.form.submit()">
                                <br><br>
                            </form>
                        </td>
                        <td><?php echo $product["price"]." บาท"; ?></td>
                        <td><?php echo $product["price"]*$product["quantity"]." บาท"; ?></td>
                        <td><?php $discount = 0;
							for ($x = 1; $x <= $product["quantity"]; $x++) {
								if(($x % 4 ) == 0){
									$discount += $product["price"];
								}
							}
							echo $discount." บาท";?></td>
                    </tr>
                    <?php
$total_price += ($product["price"]*$product["quantity"]);
$net_amount += ($product["price"]*$product["quantity"])-$discount;

}
?>

                    <tr>
                        <td colspan="6" align="right">
                            <strong>ยอดรวม: <?php echo $total_price. " บาท"; ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">
                            <strong>ยอดสุทธิ: <?php echo $net_amount. " บาท"; ?></strong>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- <div class="buy_div">
                <button type='submit' class='buynow' value="Submit" onclick="this.form.submit()">สั่งซื้อ</button>
            </div> -->


            <?php
            
            
}else{
	echo "<h3>ไม่มีสินค้าในตะกร้า!!</h3>";
} 
// print_r($_SESSION);
?>
            <div class="back_div">
                <button type='submit' class='back' onclick="parent.location.href='index.php'">ย้อนกลับ</button>
            </div>


        </div>
        <div style="clear:both;"></div>
</body>

</html>