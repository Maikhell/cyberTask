<?php
include'connection.php';

$sql = "SELECT  * FROM crud_tb";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

    echo "<tr>";
    echo "<td>" . $row ['taskName'] . "</td>";
    echo "<td>" . $row['startDate']. "</td>";
    echo "<td>" . $row['dueDate']. "</td>";
    echo "<td class='no-padding'>";
    echo "<div class='progress'>";
    echo "<div class='progress-bar custom-progress' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100'>";
    echo $row['percentageBar'] . "%";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "<td>" . $row['progressStatus'] . "</td>";
    echo "<td>" . $row['taskNote'] . "</td>";
    echo "</tr>";

}

?>