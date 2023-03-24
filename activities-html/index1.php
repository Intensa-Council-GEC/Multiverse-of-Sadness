<?php session_start(); 
if(!isset($_SESSION['user_name']))
header("Location:../login.php");
?>
<html>
<title>SafeSpend | Activities</title>
<link rel="icon" href="../public/playground_assets/Logo.png" type="image/x-icon">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" data-tag="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" data-tag="font" />
    <link rel="stylesheet" href="index1.css">
    <style>
    .progressbar{
        border-radius: 10px;
        color:black;
        background: greenyellow;
    }
    .Progress p{
        font-size: 13;
    }
    button{
            cursor:pointer;
        }
    .menu-button1 {
  width: 130px;
  height: 40px;
  background-color: #aeff83;
  border-radius: 10px;
  border-color: #f5f5fb;
  transition: 0.3s;
  align-items: center;
}
.menu-button1:hover{
    background-color: greenyellow;
    width:140px;
    height:45px;
}
.add-transaction-button{
  background-color: #4ad400;
  width: 200px; 
  height:40px;
  font-weight: 700;
  font-size: large;
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  transition: 0.3s;
}
.add-transaction-button:hover{
    background-color: darkgreen;
    width:210px;
    height:45px;
}
</style>
    <!---->

</head>

<body class="body">

    <div class="reminders-page">

        <!-- Right Division-->
        <div class="reminders-page-right">
            <div class="profile">
            <?php
$conn = new mysqli('localhost', 'root', '', 'safespend-2');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $var = $_SESSION['user_name'];
    $sql = "SELECT profile_pic_url FROM user where email='$var'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($images = mysqli_fetch_assoc($result)) {


?>
<img src="../uploads/<?= $images['profile_pic_url'] ?>" class="profilephoto1" style="width: 50px; border:solid black;border-radius:25px;position:relative;top:15px;">

<?php
        }
    }
}
?>
                <div class="username">
                    <?php
                    $var = $_SESSION['name'];
                    ?>
                    <p><?= $var ?></p>
                </div>
            </div>
            <div class="Progress">
                <span>Progress</span>
                <?php
                $var = $_SESSION['user_name'];
                $sql = "SELECT * from Budget join keeps on BID=Budget_ID where emailkeeps='$var'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while( $row = mysqli_fetch_assoc($result)){
                        $spentamt = $row['Spent_amount'];
                        $totalamt = $row['Total_amount'];
                        $category = $row['category'];
                        if($totalamt!=0)
                        $percentage = (float) $spentamt / (float) $totalamt * 100;
                        else
                            $percentage = 0;
                        $percentage = round($percentage, 2);
                        if($spentamt>$totalamt)
                        {
                            echo '<p style="color:red;">Budget_for_'.$category.'_exceeded '.$percentage.'% Used</p>';
                        } else {
                            echo  '<p style="color:green;"> '. $row['category'] .'<br>'. $percentage .'%<br>';
                            echo '<progress class="progressbar" value="' . $spentamt . '" max="' . $totalamt . '"></progress>';
                        }
                    }
                }
                ?>
            </div>
            <div class="Reminders">
                <span></span>
            </div>

            <div class="add-transaction">
                <a href="../addtran.php"><button type="button" class="add-transaction-button">
                        <i class="fa-solid fa-plus"></i> + Add Transaction
                    </button></a>
            </div>
        </div>

        <!-- Left Division-->
        <div class="reminders-page-left">
            <!-- Logo -->
            <div class="brand">
                <img src="../public/playground_assets/Logo.png" class="Logo">

                <div class="brand-text">
                    <span class="brand-text1">X</span>
                    <span class="brand-text2">pens</span>
                    <span class="brand-text3">O</span>
                </div>

            </div>
            <div class="reminders-page-left-menu">
                <span class="reminders-page-text1"><a href="../transactions-html/index1.php"><button class="menu-button1"><span class="menutext">Transactions</span></button></a></span>
                <span class="reminders-page-text2"><a href="../budget-html/index1.php"><button class="menu-button1"><span class="menutext">Budgets</span></button></a></span>
                <span class="reminders-page-text3"><a href="../report-html/index1.php"><button class="menu-button1"><span class="menutext">Report</span></button></a></span>
                <span class="reminders-page-text4"><a href="../activities-html/index1.php"><button class="menu-button1" style="background-color:#65f9c5;"><span class="menutext">Activities</span></button></a></span>
                <span class="reminders-page-text5"><a href="../reminders-html/index1.php"><button class="menu-button1"><span class="menutext">
                                <x>Reminders<x>
                            </span></button></a></span>
                <span class="reminders-page-text6"><a href="../educate-html/index1.php"><button class="menu-button1"><span class="menutext">Educate</span></button></a></span>
                <span class="reminders-page-text7"><a href="../help-html/index1.php"><button class="menu-button1"><span class="menutext">Help</span></button></a></span>
                <span class="reminders-page-text8"><a href="../shopping-html/index1.php"><button class="menu-button1"><span
                                class="menutext">Shopping List</span></button></a></span>
                <div style="position: relative; top:670px; left:20px;"><a href="../register.php"><span
                            style="color: red; font-size: 20; ">Log Out</span></a></div>
            </div>
        </div>
        <div class="searchbar">
            <form>
                <input type="search" placeholder="  Search" name="search" style="border: 20px;width:160px;" required>
            </form>
            <img src="../public/playground_assets/search.svg" class="Searchicon">
        </div>
        <!-- Mid Division-->
        <div class="reminders-page-middle">

            <h1>Activities</h1>
            <div class="transactions-table">
                <table border="5" cellspacing="2" cellpadding="2" width="70%" margin="auto" id="myTable" style="border:5px solid black; border-radius:10px;">
                    <tr height="60px" class="header">
                        <th bgcolor="#AEF28A" width="25%">
                            <font face="Arial">Date & Time</font>
                        </th>
                        <th bgcolor="#AEF28A" width="25%">
                            <font face="Arial">Type</font>
                        </th>
                        <th bgcolor="#AEF28A">
                            <font face="Arial">Amount</font>
                        </th>
                        <th bgcolor="#AEF28A">
                            <font face="Arial">Category</font>
                        </th>
                        
                    </tr>
                    <?php include 'print-activities.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>