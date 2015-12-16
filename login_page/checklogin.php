<?php

$username = $_POST['name'];
$pw = $_POST['pwd'];


include ('.\DBCon.php');

// preparing 
$query = "SELECT password FROM officer_login WHERE user_name=?";
if ($stmt = $con->prepare($query)) {
    //binding
    $stmt->bind_param("s", $username);

    // set parameters and execute
//    $u_name = $username;
    $stmt->execute();

    /* store result */
    $stmt->store_result();
    //checking empty result set
    if ($stmt->num_rows == 0) {
        echo "NO such login name";
        header('location: login.php?msg=Invalid username.Enter again.');
    } else {
        //result set non empty
        /* bind result variables */
        $stmt->bind_result($pwd);

        /* fetch values */
        /* while ($stmt->fetch()) {
          echo $pwd;
          } */
        if ($stmt->fetch()) {
            
            if ($pwd == $pw) {
                header('location: home.php?msg='.$username);
            } else {
                
                header('location: login.php?msg=Invalid password.Enter again.');
            }
        }
    }
} else {
    echo "error checklogin.php preparestatement failure";
}

/* close statement */
$stmt->close();

$con->close();



/*
  if ($un == 'abc' && $pw == '123') {
  header('location: index.php');
  } else {
  header('location: index.php?msg=error');
  }
 */
?>


