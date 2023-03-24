<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'safespend-2');

    if (isset($_POST['budget_delete_id'])) {
        $BID = $_POST['budget_delete_id'];
        $counts = 0;
        $countf = 0;
        echo $BID;
        $email = $_SESSION['user_name'];
        
            $query = "SELECT * FROM Budget join keeps on BID=Budget_ID where BID=$BID AND Emailkeeps = '$email'";
            $result = mysqli_query($mysqli, $query);
            if (mysqli_num_rows($result) == 1) {
                $stmt = $mysqli->prepare("delete from Budget where BID = $BID");
                $stmt->execute();
                $stmt->close();
                $counts++;
            } else {
                $countf++;
            }
        
        $mysqli->close();

        header("Location:budget-index.php?error=$counts queries Successful , $countf queries unsuccessful");
    }
    header("Location:budget-index.php?error=No Records Selected");

?>