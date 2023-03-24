<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'safespend-2');
if (isset($_POST['transaction_delete_multiple_btn'])) {
    if(isset($_POST['transaction_delete_id'])){
    $all_id = $_POST['transaction_delete_id'];
    $extract_id = implode(',', $all_id);
    $counts = 0;
    $countf = 0;

    $email = $_SESSION['user_name'];

    foreach ($all_id as $item_id) {
        //To get amount to be deleted
        $query = "SELECT * FROM Transaction join performs on TID=Transaction_ID WHERE Emailperforms='$email' and TID = $item_id";
        $result = mysqli_query($mysqli, $query);
        $row = $result->fetch_assoc();
        $deletedamount = $row['Amount']; //Get amount that is to be deleted;
        $category = $row['category'];

        //To check if the given Transaction ID to be deletd exists
        $query = "SELECT * FROM Transaction join performs on TID=Transaction_ID where TID = '$item_id' AND Emailperforms = '$email'";
        $result = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($result) == 1) {
            
            //Updating the budget for type Debit
            $row = $result->fetch_assoc();
            if($row['Type'] =='Debit'){
            $category = $row['category'];
            $stmt = $mysqli->prepare("update budget set Spent_amount = (select sum(amount) from Transaction join performs on TID=Transaction_ID where category='$category' and Emailperforms='$email' and Type='Debit')-$deletedamount where category='$category'");
            $stmt->execute();
            $stmt->close();

            
            }
            else{


                //To get the total amount from budget of the category of transaction to be deleted
            $query = "SELECT Total_amount FROM Budget join keeps on BID = Budget_ID where Emailkeeps='$email' and category='$category'";
            $result = mysqli_query($mysqli, $query);
            $row = $result->fetch_assoc();
            $amount = $row['Total_amount'];
                print_r("Total amount initial: $amount<br>");

            //To get the amount of the transaction to be deleted
            $query = "SELECT * FROM Transaction join performs on TID=Transaction_ID WHERE Emailperforms='$email' and TID = $item_id";
            $result = mysqli_query($mysqli, $query);
            $row = $result->fetch_assoc();
            $deletedamount = $row['Amount'];
                print_r("Amount to be deleted: $deletedamount<br>");

            $category = $row['category'];
            $total_amount = $amount - $deletedamount;
                print_r("Final amount: $total_amount<br>");
            $stmt = $mysqli->prepare("update budget set Total_amount = '$total_amount' where category='$category'");
            $stmt->execute();
            $stmt->close();
            }
            //Remaining: Delete Transaction of type Credit

            $stmt = $mysqli->prepare("delete from transaction where TID = '$item_id'");
            $stmt->execute();
            $stmt->close();
            //header('Location: index1.php?error=Transaction Deleted Successfully!');
            $counts++;
        } else {
            $countf++;
        }
    }

        $mysqli->close();
        header("Location:index1.php?error=$counts queries Successful , $countf queries unsuccessful");
    }
    header("Location:index1.php?error=No Records Selected");
}
?>