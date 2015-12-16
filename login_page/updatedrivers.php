<html>
    <head></head>
    <body>
        <?php
        $dnic = $_POST['sel1'];
        echo "driver nic".$dnic;
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $lno = $_POST['licence_no'];
        $addr = $_POST['address'];

        if ($dnic == '' || $fname == '' || $lname == '' || $lno == '' || $addr == '') {
            header('location: drivers.php?msg=Fill all input data before submission.');
        } else {
            include ('.\DBCon.php');
            //checking peimary key exsistance done previously
            //UPDATE device SET description=?,on_service=?,bought_date=?,end_date=? WHERE device_id=?
            // preparing 
            $query = "UPDATE  driver SET first_name=?,last_name=?,licence_no=?,address=?,availabilty=1,on_service=1 WHERE d_nic=?";
            if ($stmt = $con->prepare($query)) {
                //binding
                $stmt->bind_param("sssss", $first_name, $last_name, $licence_no, $address, $d_nic);

                // set parameters and execute
                $d_nic = $dnic;
                $first_name = $fname;
                $last_name = $lname;
                $licence_no = $lno;
                $address = $addr;

                if (!($stmt->execute())) {
                    //createLog(mysql_error());
                    echo "Error,updatedrivers.php,driver not updated";
                } else {

                    echo 'driver updated';
                    header('location: drivers.php?msg=');
                }
            } else {
                echo "error checklogin.php preparestatement failure";
            }
            $stmt->close();
        }
        // close statement 
        $con->close();
        ?>

    </body>
</html>
