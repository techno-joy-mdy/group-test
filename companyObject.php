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
	function getCompany($id){
		$sql="SELECT * FROM companies WHERE id='$id'";
		$result=$this->con->query($sql);
		return $result->fetch_assoc();
	}
	function updateCompany($id,$name,$phone,$address,$type){
		$sql="UPDATE companies SET name='$name',phone='$phone',address='$address',type='$type' WHERE id='$id'";
		$this->con->query($sql);
		return true;
	}
	function deleteCompany($id){
		$sql="DELETE FROM companies WHERE id='$id'";
		$this->con->query($sql);
		return true;
	}
}
// header("location:page1.php");
?>