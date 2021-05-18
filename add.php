<?php include('db.php');?>
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
        <li><a class="active" onclick="parent.location.href='add.php'">เพิ่มสินค้าใหม่</a></li>
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
    ?>
        <br>
        <div class="formadd_div">
        <form action="addsuccess.php" method='post' >
            
            <label for="name">ชื่อสินค้า:</label><br>
            <input type="text" class='name' id="name" name ="name" ></input><br><br>
            <label for="code">รหัสสินค้า:</label><br>
            <input type="number" class='code' id="code" name ="code" min ="0"></input><br><br>
            <label for="price">ราคา:</label><br>
            <input type="number" class='price' id="price" name ="price" min ="0"></input><br><br>
            <label for="image">รูปสินค้า</label><br>
            <input type="file" class='image' id="image" name ="image" ></input><br><br>
            
            <button type="submit" value="submit" class='add' name="submit">เพิ่มสินค้า</button>
        </form>
        </div>
       
    
    </div>

</body>
</html>