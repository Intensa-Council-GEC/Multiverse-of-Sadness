<?php
$mysqli = new mysqli('localhost', 'root', '', 'safespend-2');
$var = $_SESSION['user_name'];
$query = "SELECT * FROM transaction join performs on TID = Transaction_ID where Emailperforms = '$var'";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["time"];
        $field2name = $row["Type"];
        $field3name = $row["Amount"];
        $field4name = $row["category"];
        echo '<tr> 
                  <td>' . $field1name . '</td> 
                  <td>' . $field2name . '</td> 
                  <td>' . "Rs. " . $field3name . '</td>' ;
        if ($field4name == 'General') {
            echo '<td bgcolor="#FF2A00">' . $field4name . '</td>';
        } else if ($field4name == 'Transport'){
            echo '<td bgcolor="#FFC300">' . $field4name . '</td>';
        }
        else if ($field4name == 'Food'){
            echo '<td bgcolor="#FF5733">' . $field4name . '</td>';
        }
        else if ($field4name == 'Shopping'){
            echo '<td bgcolor="#83dadc">' . $field4name . '</td>';
        }
        else if ($field4name == 'Rent'){
            echo '<td bgcolor="#d483dc">' . $field4name . '</td>';
        }
        else if ($field4name == 'Petrol'){
            echo '<td bgcolor="#f7619f">' . $field4name . '</td>';
        }
        else if ($field4name == 'Medicine'){
            echo '<td bgcolor="#f7a93f">' . $field4name . '</td>';
        }
        else if ($field4name == 'Entertainment'){
            echo '<td bgcolor="#f7de3f">' . $field4name . '</td>';
        }
        echo '</tr>';
    }
    $result->free();
}
echo '<script type="text/javascript>

    </script>';
?>