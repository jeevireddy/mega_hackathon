<?php
class ClickClass
{
	public $SessionID;
	public $IPAddress;
	public $EntryTime;
	public $clickType;
	public $clickContent;
	public $ClickComment;
	public $CurrentPage;
	public $Country;
	public $City;
	 function __construct(){
		if (!empty($_SERVER['REMOTE_ADDR'])) {
			$this->IPAddress = $_SERVER['REMOTE_ADDR'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$this->IPAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$this->IPAddress = $_SERVER['HTTP_CLIENT_IP'];
		}
		$this->EntryTime=time();
		
	}
}

?>