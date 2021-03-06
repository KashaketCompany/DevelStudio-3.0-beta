<?php

class TWebzServer extends __TNoVisual
{
	
	public function __construct($owner=nil,$self=nil)
	{
		parent::__construct($owner,$self);
		if($self==nil)
		{
		$this->Address				= '192.168.0.101';
		$this->Port					= 80;
		$this->ServerDirectory		= 'www';
		$this->AllowDirListening	= false;
		$this->CheckPHPScripts		= false;
		$this->PHPExtensions		= ['php', 'phtml', 'php5', 'php7', 'phpt'];
		}
	}
	
}