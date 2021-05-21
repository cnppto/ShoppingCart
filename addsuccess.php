<?php
include('db.php');


$name=$_POST["name"];
$code=$_POST["code"];
$price=$_POST["price"];
$image=$_POST["image"];

$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);

$partimg = "product-images/".$image;

$sql = "INSERT INTO `products` ( `name`, `code`, `price`, `image`) VALUES ('$name','$code','$price', '$partimg')";



if ($code == "" ||  $name == "" || $price == "" || $image == "") {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าไม่สำเร็จ!! กรุณากรอกข้อมูลสินค้าให้ครบถ้วน');";
        echo "window.location='add.php';";
        echo "</script>";
}else if ($code =  $row['code'] || $name = $row['name']){
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าไม่สำเร็จ!! กรุณากรอกข้อมูลสินค้าให้ถูกต้อง ');";
        echo "window.location='add.php';";
        echo "</script>";
}else{
        $insert = mysqli_query($con, $sql);
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าเรียบร้อย');";
        echo "window.location='index.php';";
        echo "</script>";
        
}
?>
<!-- $code ==  $row['code'] || -->