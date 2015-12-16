<?php

$un = $_POST['un'];
$pw = $_POST['pw'];

if ($un == 'abc' && $pw == '123') {
    header('location: index.php');
} else {
    header('location: index.php?msg=error');
}
?>