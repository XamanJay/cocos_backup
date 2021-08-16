<?php 

class HomeController{

	function __construct(){}

	public function getIndex()
	{
		
		include("views/Home/index.php");
	}

}


?>