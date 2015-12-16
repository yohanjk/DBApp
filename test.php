<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test</title>
    </head>
    <body>
        <?php
        include './DBCon.php';
        $sql = "SELECT c_nic FROM customer;";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "c_NIC " . $row["c_nic"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $con->close();
        ?>
        
    </body>
</html>
