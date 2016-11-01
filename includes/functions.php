<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='secret';
$dbname='bloodnow';
global $connection;
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
	die("Database connection failed:".mysqli_connect_error());
}

function all_donors(){
	global $connection;
	$query="SELECT * FROM donor_info;";
	$result=mysqli_query($connection,$query);
	return $result;
}
function del_donor_info($del_id){
	global $connection;
	$query="DELETE FROM donor_info WHERE donor_id='$del_id';";
	$result=mysqli_query($connection,$query);
	return $result;
}
function insert_donor_info($donor_id,$name,$reg_no,$phone_no,$gender,$blood_group)
{
	global $connection;
	$query="INSERT INTO donor_info(donor_id,name,reg_no,phone_no,gender,blood_group) values('$donor_id','$name','$reg_no','$phone_no','$gender','$blood_group');";
	
	$result=mysqli_query($connection,$query);
	return $result;
}