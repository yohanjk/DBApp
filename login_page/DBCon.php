
       <?php
/*
www.dbprojectg5.net16.net

buddhiayesha2013@gmail.com
123dbprojectg5
host:                           mysql11.000webhost.com	
MySQL database name:		a9969692_dbproj
MySQL user name:		a9969692_db123
Password for MySQL user:	123dbprojectg5
  */  

//$host = 'mysql11.000webhost.com';
//$database = 'a9969692_dbproj';
//$user = 'a9969692_db123';
//$password = '123dbprojectg5';
//$port = '3306';

$host = 'localhost';
$database = 'taxi_new';
$user = 'root';
$password = '';
$port = '3306';

$con = mysqli_connect($host, $user, $password, $database, $port);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
 