<?php

 class User
{
	private $UserId, $UserName, $UserPassword;

	public function getUserId()
	{
		return $this->UserId;
	}

	public function getUserName()
	{
		return $this->UserName;
	}

	public function getUserPassword()
	{
		return $this->UserPassword;
	}


	public function setUserName($UserName)
	{
		$this->UserName = $UserName;
	}

	public function setUserPassword($UserPassword)
	{
		$this->UserPassword = $UserPassword;
	}

	public function insertNewUser()
	{	
		include "connection.php";

		
                    $prepared = $connection->prepare("INSERT INTO tblusers (username , password) VALUES (:username , :password)");

                    $prepared->execute(array(

                                    ":username"=> $this->getUserName(),
                                    ":password"=> $this->getUserPassword()
                            ));
                
                


	}

}

?>