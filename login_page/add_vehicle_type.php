<html>
    <head></head>
    <body>
        <?php
        $tid = $_POST['type_id'];
        $dtl = $_POST['detail'];
       
        if ($tid  == '' || $dtl == '') {
            header('location: vehicles.php?msg=Fill all vehicle type data before enter.');
        } else {

            include ('.\DBCon.php');
            //checking peimary key exsistance

            $query1 = "SELECT d_nic FROM driver WHERE d_nic=?";
            if ($stmt1 = $con->prepare($query1)) {
                //binding
                $stmt1->bind_param("s", $de_nic);

                // set parameters and execute
                $de_nic = $dnic;
                $stmt1->execute();

                // store result 
                $stmt1->store_result();
                //checking empty result set
                if (!($stmt1->num_rows == 0)) {
                    $stmt1->close();
                    echo "driver  already exists";
                    echo "return with label device exist";
                    header('location: drivers.php?msg=Driver id is already exist.Enter new one.');
                } else {
                    $stmt1->close();
                    // preparing 
                    $query = "INSERT INTO driver (d_nic,first_name,last_name,licence_no,address,availabilty,on_service) VALUES (?,?,?,?,?,1,1)";
                    if ($stmt = $con->prepare($query)) {
                        //binding
                        $stmt->bind_param("sssss",$d_nic,$first_name,$last_name,$licence_no,$address);

                        // set parameters and execute
                        $d_nic=$dnic;
                        $first_name=$fname;
                        $last_name=$lname;
                        $licence_no=$lno;
                        $address=$addr;

                        if (!($stmt->execute())) {
                            //createLog(mysql_error());
                            echo "Error,adddrivers.php,driver not added";
                        } else {

                            echo 'driver added';
                            header('location: drivers.php?msg=');
                        }
                    } else {
                        echo "error checklogin.php preparestatement failure";
                    }
                    $stmt->close();
                }

                // close statement 


                $con->close();
            }
        }
        
        
        ?>



    </body>
</html>
