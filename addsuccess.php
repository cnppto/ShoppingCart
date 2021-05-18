<?php include ('db.php');?>
<?php


$name=$_POST["name"];
$code=$_POST["code"];
$price=$_POST["price"];
$image=$_POST["image"];

$partimg = "product-images/".$image;

$sql = "INSERT INTO `products` ( `name`, `code`, `price`, `image`) VALUES ('$name','$code','$price', '$partimg')";


if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าเรียบร้อย');";
        echo "window.location='index.php';";
        echo "</script>";
}else{
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าไม่สำเร็จ');";
        echo "window.location='add.php';";
        echo "</script>";
}
?>