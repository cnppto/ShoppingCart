<?php include ('db.php');?>
<?php


$name=$_POST["name"];
$code=$_POST["code"];
$price=$_POST["price"];
$image=$_POST["image"];

$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$code1 = $row['code'];

$partimg = "product-images/".$image;

$sql = "INSERT INTO `products` ( `name`, `code`, `price`, `image`) VALUES ('$name','$code','$price', '$partimg')";



if ($code == $code1) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าไม่สำเร็จ!! รหัสสินค้าไม่ถูกต้อง ');";
        echo "window.location='add.php';";
        echo "</script>";
}else if ($name == "") {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าไม่สำเร็จ!! ชื่อสินค้าไม่ถูกต้อง ');";
        echo "window.location='add.php';";
        echo "</script>";
}else if ($price == "") {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าไม่สำเร็จ!! ราคาสินค้าไม่ถูกต้อง ');";
        echo "window.location='add.php';";
        echo "</script>";
}else if ($image == "") {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าไม่สำเร็จ!! รหัสสินค้าไม่ถูกต้อง ');";
        echo "window.location='add.php';";
        echo "</script>";
}else{
        if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าเรียบร้อย ^^');";
        echo "window.location='index.php';";
        echo "</script>";
        }
}
?>