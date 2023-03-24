<?php session_start(); 
if(!isset($_SESSION['user_name']))
header("Location:login.php");
?>
<?php
$amount = $_POST['amount'];
$category = $_POST['category'];

$mysqli = new mysqli('localhost', 'root', '', 'safespend-2');
if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
} else {
    session_start();
    $email = $_SESSION['user_name'];
    $query = "SELECT max(BID) FROM budget";
    if ($result = $mysqli->query($query)) {
        if ($row = $result->fetch_assoc()) {
            $BID = $row['max(BID)'];
            $BID = $BID + 1;
        } else {
            $BID = 1;
        }
    }
    $query = "select * from Budget join keeps on BID=Budget_ID where Emailkeeps='$email' and category = '$category'";
    $result = $mysqli->query($query);
    if (mysqli_num_rows($result) == 0) {
        $stmt = $mysqli->prepare("insert into budget (BID,Total_amount,category) values(?,?,?)");
        $stmt->bind_param("iis", $BID, $amount, $category);
        $stmt->execute();
        $stmt->close();
        $stmt = $mysqli->prepare("insert into keeps (Emailkeeps,Budget_ID) values(?,?)");
    $stmt->bind_param("si", $email, $BID);
    $stmt->execute();
    $stmt->close();

    $query = "select * from Transaction join performs on TID=Transaction_ID where Emailperforms='$email' and category='$category' and Type='Debit'";
    $result = $mysqli->query($query);
    if (mysqli_num_rows($result) > 0) {
        $stmt = $mysqli->prepare("update budget set Spent_amount = (select sum(amount) from Transaction join performs on TID=Transaction_ID where category='$category' and Emailperforms='$email' and Type='Debit') where category='$category' and BID='$BID'");
        $stmt->execute();
        $stmt->close();
    }

    $query = "select * from Transaction join performs on TID=Transaction_ID where Emailperforms='$email' and category='$category' and Type='Credit'";
    $result = $mysqli->query($query);
    if (mysqli_num_rows($result) > 0) {
        $stmt = $mysqli->prepare("update budget set Total_amount = (select sum(amount) from Transaction join performs on TID=Transaction_ID where category='$category' and Emailperforms='$email' and Type='Credit')+$amount where category='$category' and BID='$BID'");
        $stmt->execute();
        $stmt->close();
    }
    }
    else
    {
        $query = "select * from Budget join keeps on BID=Budget_ID where Emailkeeps='$email' and category = '$category'";
        $result = $mysqli->query($query);
        $rows = $result->fetch_assoc();
        $BID = $rows['BID'];
        $current_budget = $rows['Total_amount'];
        $total_amount = $amount + $current_budget;
        $stmt = $mysqli->prepare("UPDATE Budget set Total_amount =$total_amount where BID='$BID'");
        $stmt->execute();
        $stmt->close();
    }
    $mysqli->close();
    header('Location: budget-index.php');
}
?>