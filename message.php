<?php

session_start();

if(isset($_SESSION['login']))
{
    include "php/Chat.php";
    include "php/User.php";
    
    
    //$chats = new Chat();
    
   //$chats->DisplayMessages();
    
?>
<html>
    <head>
        <title>This is the Chat</title>
        <link href="style/Styles.css" rel="stylesheet"  type="text/css"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script>
            
            $(document).ready(function(){
                
                $("#sendMessage").keyup(function(e)
                {
                    if(e.KeyCode == 13 || e.which == 13)
                    {
                        $.ajax({
                            type:'POST',
                            url:'php/request.php',
                            data:{ChatMessage:$("#sendMessage").val()},
                            success:function()
                            {
                                $("#divShowMessages").load("php/DisplayMessage.php");
                                $("#sendMessage").val("");
                            }
                        });
                    }
                });
                setInterval(function()
                {
                    $("#divShowMessages").load("php/DisplayMessage.php");
                },1500);
                $("#divShowMessages").load("php/DisplayMessage.php");
                    
              
               
            });
            
        </script>
        
    </head>
    
    <body>
        <?php echo "<h4>Welcome ".$_SESSION['userId']." ". $_SESSION['name'] ."</h4>";?>
        <div id="divContainerOfMessage">
            <div id="divShowMessages">
        
            </div> 
        
        
            <textarea id="sendMessage" placeholder="Write message here"></textarea>
        </div>
        
        
    </body>
    
</html>
   

<?php
}
else
{
    session_destroy();
    header("Location:http://localhost/ChatApplication/login.php");
}


?>