<?php
class Index{
	public $con;
	function __construct($host="localhost", $user="root",$pw="",$db="company"){
		$this->con = new mysqli($host,$user,$pw,$db);
	}
	public function disconnet(){
		$this->con=null;
	}
}
 ?>
