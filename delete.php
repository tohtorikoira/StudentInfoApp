<?php
require 'keys.php';
include 'ChromePhp.php';
ChromePhp::log(date("Y"));
$conn=mysqli_connect($host, $dbuser, $pass, $dbname);

if (mysqli_connect_errno()) {
	
	die("Connection Failed! " . mysqli_connect_error());

}

$postdata = file_get_contents("php://input");
ChromePhp:: log('post');
if(isset($postdata) && !empty($postdata))
{
    $request     = json_decode($postdata);
    $delID  = ($request->delID);
    ChromePhp:: log($delID);
    
    if($delID  == '') return;
    $sql = "DELETE FROM student_info WHERE id=$delID;";
    ChromePhp:: log($sql);
    mysqli_query($conn,$sql);
}  ChromePhp::log('Hello console! del');
exit;