<?php
session_start();
$success = "";
$error_message = "";
$conn = mysqli_connect("localhost", "root", "", 'safespend-2');
$count = 1;
// generate OTP
$otp = rand(100000, 999999);
// Send OTP
require_once("mail_function.php");

$mail_status = sendOTP($_SESSION['user_name'], $otp);

if ($mail_status == 1) {
	$result = mysqli_query($conn, "INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s") . "')");
	$current_id = mysqli_insert_id($conn);
	if (!empty($current_id)) {
		$success = 1;
	}
}
if (!empty($_POST["submit_otp"])) {
	$result = mysqli_query($conn, "SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count = mysqli_num_rows($result);
	if (!empty($count)) {
		$result = mysqli_query($conn, "UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;
	} else {
		$success = 1;
		$error_message = "Invalid OTP!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>SafeSpend | OTP Verification</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">       
	<style media="screen">
		*,
		*:before,
		*:after {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		body {
			background-color: #e5e5e5;
			font-family: 'Poppins', sans-serif;
		}

		.background {
			width: 430px;
			height: 520px;
			position: absolute;
			transform: translate(-50%, -50%);
			left: 50%;
			top: 50%;
		}

		.background .shape {
			height: 200px;
			width: 200px;
			position: absolute;
			border-radius: 50%;
		}

		.shape:first-child {
			background: linear-gradient(green,
					#B8A52A);
			left: -80px;
			top: -80px;
		}

		.shape:last-child {
			background: linear-gradient(to right,
					#ff512f,
					#f09819);
			right: -30px;
			bottom: -80px;
		}

		form {
			height: 570px;
			width: 400px;
			background-color: rgba(51, 255, 61, 0.22);
			position: absolute;
			transform: translate(-50%, -50%);
			top: 50%;
			left: 50%;
			border-radius: 10px;
			backdrop-filter: blur(10px);
			border: 2px solid rgba(255, 255, 255, 0.1);
			box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
			padding: 50px 35px;
		}

		form * {
			font-family: 'Poppins', sans-serif;
			color: #080710;
			letter-spacing: 0.5px;
			outline: none;
			border: none;
		}

		form h3 {
			font-size: 32px;
			font-weight: 500;
			line-height: 42px;
			text-align: center;
		}

		label {
			display: block;
			margin-top: 30px;
			font-size: 16px;
			font-weight: 500;
		}

		input {
			display: block;
			height: 50px;
			width: 100%;
			background-color: rgba(44, 66, 45, 0.22);
			border-radius: 3px;
			padding: 0 10px;
			margin-top: 8px;
			font-size: 14px;
			font-weight: 300;
		}

		::placeholder {
			color: #e5e5e5;
		}

		button {
			margin-top: 50px;
			width: 100%;
			background-color: green;
			color: #080710;
			padding: 15px 0;
			font-size: 18px;
			font-weight: 600;
			border-radius: 5px;
			cursor: pointer;
		}

		.social {
			margin-top: 30px;
			display: flex;
		}

		.social div {
			background: red;
			width: 150px;
			border-radius: 3px;
			padding: 5px 10px 10px 5px;
			background-color: rgba(42, 66, 43, 0.22);
			color: #eaf0fb;
			text-align: center;
		}

		.social div:hover {
			background-color: rgba(255, 255, 255, 0.47);
		}

		.social .fb {
			margin-left: 25px;
		}

		.social i {
			margin-right: 4px;
		}
		.closebutton{
    display: block;
    margin:0 0 auto;
    background-color: transparent;
    font-size: 30px;
    color: #ffffff;
    background: #03549a;
    border-radius: 100%;
    width: 40px;
    height: 40px;
    border: none;
    outline: none;
    cursor: pointer;
}
	</style>
</head>

<body>
	<div class="background">
		<div class="shape"></div>
		<div class="shape"></div>
	</div>
	<a href = "login.php"><button id="close" class = "closebutton">&times;</button></a>
	<form name="frmUser" method="post">
		<h2>OTP Verification</h2>
		<p style="color:#000000;">Check your email for the OTP</p>
		<label>OTP</label>

		<input type="text" name="otp" placeholder="One Time Password" class="login-input" required><br />
		<button type="submit" name="submit_otp" value="Submit" class="btnSubmit">Submit</button>
		<?php
        if ($success == 2) {
	        header("Location:budget-index.php");
        }
        ?>

	</form>
</body>

</html>