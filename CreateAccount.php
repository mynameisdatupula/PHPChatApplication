<?php

$result="";
$successful = false;
if(isset($_POST['submit']))
{
    include "php/connection.php";
    include "php/User.php";
    
    $newUser = new User();
    
    $uname = $_POST['createUname'];
    $pass = $_POST['createPass'];
    
    $newUser->setUserName($uname);
    $newUser->setUserPassword($pass);
    
    
    try
    {
        $newUser->insertNewUser();
        $successful = true;
        $result = "Account created successfully";
    }
    catch(Exception $e)
    {
        die("Error in inserting new user".$e->getMessage());
    }
}


?>

<html>
    <head>
        <title>Create Account</title>
        
    </head>
    
    <body>
        <div>
            <h4><?php echo $result;?></h4>
            <?php
                if($successful == true)
                {
                    echo "<a href=\"login.php\" >Go back</a>";
                    echo "<br>";
                }
            ?>
            <form action="" method="POST">
                <div>Enter desired username:<input type="text" id="createUname" name="createUname"/> </div>
                <div>Enter desired password:<input type="password" id="createPass" name="createPass"/> </div>
                <div><input type="submit" value="submit" name="submit"/></div>
            </form>
        </div>
        
    </body>
</html>