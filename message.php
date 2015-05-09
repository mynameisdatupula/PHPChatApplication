<?php

session_start();

if(isset($_SESSION['login']))
{
    echo "<h4>Welcome ".$_SESSION['name']."</h4>";
    
    
}
else
{
    session_destroy();
    header("Location:http://localhost/ChatApplication/login.php");
}


?>