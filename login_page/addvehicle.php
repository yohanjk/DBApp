<html>
    <head></head>
    <body>
        <?php
        $rnum = $_POST['reg_num'];
        $type = $_POST['type_id'];
        $sno = $_POST['seats'];
        $acchk = $_POST['ac'];
        
        if ($rnum == '' || $type == '' || $sno == '' || $lno==''||$acchk=='') {
            header('location: vehicles.php?msg=Fill all input data before submission.');
        } else {

            include ('.\DBCon.php');
            //checking peimary key exsistance

            $query1 = "SELECT reg_number FROM vehicle WHERE reg_number=?";
            if ($stmt1 = $con->prepare($query1)) {
                //binding
                $stmt1->bind_param("s", $r_num);

                // set parameters and execute
                $r_num = $rnum;
                $stmt1->execute();

                // store result 
                $stmt1->store_result();
                //checking empty result set
                if (!($stmt1->num_rows == 0)) {
                    $stmt1->close();
                    echo "vehicle  already exists";
                    echo "return with label device exist";
                    header('location: vehicles.php?msg=Vehicle is already exist.Enter new one.');
                } else {
                    $stmt1->close();
                    // preparing 
                    $query = "INSERT INTO vehicle (reg_number,with_ac,type_id,seats) VALUES (?,?,?,?)";
                    if ($stmt = $con->prepare($query)) {
                        //binding
                        $stmt->bind_param("ssss",$reg_number,$with_ac,$type_id,$seats);

                        // set parameters and execute
                        $reg_number=$rnum;
                        $with_ac=$aoiewhowhaho;
                        $type_id;
                        $seats;

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
