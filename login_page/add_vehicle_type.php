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

            $query1 = "SELECT type_id FROM vehicle_type WHERE type_id=?";
            if ($stmt1 = $con->prepare($query1)) {
                //binding
                $stmt1->bind_param("s", $type_id);

                // set parameters and execute
                $type_id = $tid;
                $stmt1->execute();

                // store result 
                $stmt1->store_result();
                //checking empty result set
                if (!($stmt1->num_rows == 0)) {
                    $stmt1->close();
                    echo "vehicle _type  already exists";
                    echo "return with label device exist";
                    header('location: drivers.php?msg=vehicle _type is already exist.Enter new one.');
                } else {
                    $stmt1->close();
                    // preparing 
                    $query = "INSERT INTO vehicle _type (type_id,detail) VALUES (?,?)";
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
