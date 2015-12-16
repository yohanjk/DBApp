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
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo 'Invalid username or password. Please try again.';
        }
        ?>

        <form action="signup.php" method="POST">
            <input type="text" name="un"/>
            <input type="text" name="pw"/>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>
