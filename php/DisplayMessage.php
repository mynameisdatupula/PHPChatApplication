<?php
    
session_start();
    if(isset($_SESSION['login']))
    {
        include "Chat.php";
    
         Chat::DisplayMessages();
    }
    
    else
        header("Location:http://localhost/ChatApplication/login.php");
            


?>

