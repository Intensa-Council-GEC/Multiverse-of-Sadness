<?php
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$name = $_POST['name'];
$mobileno = $_POST['mobileno'];
$age = $_POST['age'];
$stmt = "";
$new_img_name = "";
if(isset($_FILES['photo'])){
    $img_name = $_FILES['photo']['name'];
    $img_size = $_FILES['photo']['size'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];
    if ($error === 0) {
        if ($img_size > 1250000) {
            $em = "Sorry, Your File is too large.";
            header("Location: register.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            } else {
                $em = "You can't upload files of this type";
                header("Location: register.php?error=$em");
            }
        }
    }
}
if ($new_img_name == "")
    $new_img_name = "default.png";
$conn = new mysqli('localhost', 'root', '', 'safespend-2');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $sql = "SELECT * FROM user WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1)
        header('Location: login.php');
    $password = crypt($password,PASSWORD_DEFAULT);
    $stmt = $conn->prepare("insert into user (Email,Name,Mobile_no,Age,PASSWORD,profile_pic_url) values(?,?,?,?,?,?)"); 
    $stmt->bind_param("ssiiss", $email, $name, $mobileno, $age, $password, $new_img_name);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: login.php');
}
?>