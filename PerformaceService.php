<?php
ini_set("error_reporting", E_ALL); 
ini_set("display_errors", 1); 
session_start();
include('PerformanceClass.php');
include('ClassSessions.php');
$obj= new Performance();
date_default_timezone_set('America/New_York');
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){


	$obj->SessionID=nullif($_SESSION["id"]);
	$obj->TimeSpent=nullif($_POST["TimeSpent"]);
	$obj->EntryTime=date("Y-m-d H:i:s",time());
	$obj->CurrentPage=nullif($_POST["CurrentPage"]);
	$obj->PageLoadTime=nullif($_POST["PageLoadTime"]);
	$obj->Country=nullif($_POST["Country"]);
	$obj->City=nullif($_POST["City"]);
	$obj->referrer=nullif($_POST["referrer"]);


}
else{
	$_SESSION["id"]=ClassSessions::sessionSettor();

	$obj->SessionID=nullif($_SESSION["id"]);
	$obj->TimeSpent=nullif($_POST["TimeSpent"]);
	$obj->EntryTime=date("Y-m-d H:i:s",time());
	$obj->CurrentPage=nullif($_POST["CurrentPage"]);
	$obj->PageLoadTime=nullif($_POST["PageLoadTime"]);
	$obj->Country=nullif($_POST["Country"]);
	$obj->City=nullif($_POST["City"]);
	$obj->referrer=nullif($_POST["referrer"]);

}
//print_r($obj);

function nullif($var){
	if(isset($var) && !empty($var))
	{
		return $var;
	}
	else {return null;}
}
/*
 $sql = "INSERT INTO  tbl_page_performance_details".
		"(session_id,ip_addr,entrytime,curr_page_url,country ,city ,time_spent ,page_load_time )".
		" VALUES ('"
		.$obj->SessionID."','".$obj->IPAddress."','".$obj->EntryTime."','"
		.$obj->CurrentPage."','".$obj->Country."','".$obj->City."',"
		.$obj->TimeSpent.",".$obj->PageLoadTime.")";
 echo $sql;
*/
$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "INSERT INTO  tbl_page_performance_details".
		"(session_id,ip_addr,entrytime,curr_page_url,country ,city ,time_spent ,page_load_time,referrer_url )".
		" VALUES ('"
		.$obj->SessionID."','".$obj->IPAddress."','".$obj->EntryTime."','"
		.$obj->CurrentPage."','".$obj->Country."','".$obj->City."',"
		.$obj->TimeSpent.",".$obj->PageLoadTime.",'".$obj->referrer."')";
	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	}
echo "1 record added";
mysqli_close($con);



?>
