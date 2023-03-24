<?php session_start(); 
if(!isset($_SESSION['user_name']))
header("Location:../login.php");
?>
<?php

$item_name = $_POST['Item-name'];
$item_price = $_POST['item-price'];
$quantity =$_POST['quantity'];
$item_cat = $_POST['category'];

$mysqli = new mysqli('localhost', 'root', '', 'safespend-2');
if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
} else {
    session_start();
    $email = $_SESSION['user_name'];
   $query = "SELECT max(item_ID) FROM shopping";
    if ($result = $mysqli->query($query)) {
        if ($row = $result->fetch_assoc()) {
            $item_ID = $row['max(item_ID)'];
            $item_ID = $item_ID + 1;
        } else {
            $item_ID = 1;
        }
    }
    $stmt = $mysqli->prepare("insert into shopping (item_ID,item_name,item_price,quantity,item_cat) values(?,?,?,?,?)");
    $stmt->bind_param("isiis", $item_ID,$item_name,$item_price,$quantity,$item_cat);
    $stmt->execute();
    $stmt->close();

    $stmt = $mysqli->prepare("insert into creates (Email,item_ID) values(?,?)");
    $stmt->bind_param("si", $email, $item_ID);
    $stmt->execute();
    $stmt->close();
    
    $mysqli->close();
    header('Location: shopping-html/index1.php');
}
?>