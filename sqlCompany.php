<?php 
require "companyObject.php";
$company = new company();

function valid($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);

	return $data;
}	

	if (isset($_POST['save'])) {
		print_r($_POST);
		$name = valid($_POST['name']);
		$phone = valid($_POST['phone']);
		$address= valid($_POST['address']);
		$type = valid($_POST['type']);

			if ($name !="" && $phone !="" && $address !="" && $type != "") {
					echo "<br>".$company->insertCompany($name,$phone,$address,$type);
				}
			}
			header("location:page1.php");
 ?>