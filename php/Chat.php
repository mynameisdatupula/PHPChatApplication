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
}



?>