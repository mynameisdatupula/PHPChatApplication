<?php

    session_start();
    
    include "Chat.php";
    
    if(isset($_POST['ChatMessage']))
    {
        $chat = new Chat();
        $chat->setChatUserId($_SESSION['userId']);
        $chat->setChatMessage($_POST['ChatMessage']);
        $chat->insertChat();
    }
    else
    {
        header("Location: http://localhost/ChatApplication/login.php");
    }


?>
