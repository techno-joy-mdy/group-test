<?php 

require 'companyObject.php';
$companies=new company();
if (isset($_POST['editid'])) {
	$id=$_POST['editid'];
	$data=$companies->getCompany($id);
	echo json_encode($data);
}

 ?>