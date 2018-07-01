<?php 
require 'index.php';
/**
 *
 */
class company extends Index
{
	
	function __construct()
	{
		parent::__construct();
	}
	function insertCompany($name,$phone,$address,$type){
		$sql = "INSERT INTO companies(name, phone, address, type) VALUES ('$name','$phone','$address','$type')";
		print_r($sql);
		echo $this->con->query($sql);
		return true;
	}

}
// header("location:page1.php");
?>