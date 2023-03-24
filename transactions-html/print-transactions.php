<?php
$mysqli = new mysqli('localhost', 'root', '', 'safespend-2');
$var = $_SESSION['user_name'];
$query = "SELECT * FROM transaction join performs on TID = Transaction_ID where Emailperforms = '$var'";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["TID"];
        $field2name = $row["Mode"];
        $field3name = $row["Date"];
        $field4name = $row["Type"];
        $field5name = $row["Amount"];
        $field6name = $row["time"];
        $field6name = date("h:m:s a", strtotime($field6name));
        $field7name = $row["category"];
        echo '<tr> 
                  <td>' . $field1name . '</td> 
                  <td>' . "Rs. " . $field5name . '</td> 
                  <td>' . $field2name . '</td> 
                  <td>' . $field3name . '</td> 
                  <td>' . $field6name . '</td> 
                  <td>' . $field7name . '</td> ';
        if ($field4name == 'Debit') {
            echo '
                  <td bgcolor="#FF2A00">' . $field4name . '</td>';
        } else {
            echo '
          <td bgcolor="#77D500">' . $field4name . '</td>';
        }

        echo '<td><a href="deletetransaction.php?t_id='. $field1name .'">Delete</a></td>';
        echo '</tr>';
    }
    $result->free();
}
echo '<script type="text/javascript>

    </script>';
?>