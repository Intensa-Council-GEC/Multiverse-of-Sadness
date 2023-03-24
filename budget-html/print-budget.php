<?php
$mysqli = new mysqli('localhost', 'root', '', 'safespend-2');
$var = $_SESSION['user_name'];
$query = "SELECT * FROM budget join keeps on BID = Budget_ID where Emailkeeps = '$var'";

echo '';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["BID"];
        $field2name = (int) $row["Total_amount"];
        $field3name = (int) $row["Spent_amount"];
        $field4name = $field2name - $field3name;
        $field5name = $row["category"];
        echo '<tr> 
                  <td>' . $field1name . '</td> 
                  <td>' . "Rs. " . $field2name . '</td> ';
                  
        if ($field2name < $field3name)
            echo '<td bgcolor="red">' . "Rs. " . $field3name . '</td> ';
        else if (($field3name > ((8 / 10) * $field2name)) && ($field3name <= $field2name))
            echo '<td bgcolor="#FFA600">' . "Rs. " . $field3name . '</td> ';
        else
            echo '<td bgcolor="#8EFF00">' . "Rs. " . $field3name . '</td> ';

        echo '<td>' . "Rs. " . $field4name . '</td> 
              <td>' . $field5name . '</td> ';
              
              echo '<td><input type="checkbox" name="b_id[]" value='.$field1name.'</td>
          </tr>';

    }

    $result->free();
}
?>