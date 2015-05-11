<?php

class chat
{
	private $ChatId, $ChatUserId, $ChatMessage;

	public function getChatId()
	{
		return $this->ChatId;
	}

	public function getChatUserId()
	{
		return $this->ChatUserId;
	}

	public function getChatMessage()
	{
		return $this->ChatMessage;
	}

	public function setChatId($ChatId)
	{
		$this->ChatId = $ChatId;
	}

	public function setChatUserId($ChatUserId)
	{
		$this->ChatUserId = $ChatUserId;
	}

	public function setChatMessage($ChatMessage)
	{
		$this->ChatMessage = $ChatMessage;
	}

	public function insertChat()
	{
		include "connection.php";

		$prepare = $connection->prepare("INSERT INTO chat (chatUserId , chatMessage) VALUES (:chatId, :chatMessage)");

		$prepare->execute(array(
			":chatId" => $this->getChatUserId(),
			":chatMessage" => $this->getChatMessage()
			));
                
	}
        
        public static function DisplayMessages()
        {
            include "connection.php";
            
           try
           {
                $prepare = $connection->prepare("SELECT  chat.chatUserId, chat.chatMessage,"
                        . "tblusers.username FROM chat INNER JOIN tblusers ON (tblusers.id = chat.chatUserId)"
                        . "ORDER BY chat.chatId DESC");

                $prepare->execute();
                
                while($row = $prepare->fetch())
                {                    
                      ?>
                     
                       <span class="UserNames"><h3> <?php echo $row['username']." says";?> </h3> </span></br>
                       <span class="ChatMessages"> <?php echo $row['chatMessage'];?>  </span></br>
                       
                       <?php

                }
                
           }catch(Exception $e)
           {
               echo $e->getMessage();
           }
        }
}



?>