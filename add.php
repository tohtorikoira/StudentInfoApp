<?php
require 'keys.php';
include 'ChromePhp.php';
ChromePhp::log('Hello console! add');
$conn=mysqli_connect($host, $dbuser, $pass, $dbname);

if (mysqli_connect_errno()) {
	
	die("Connection Failed! " . mysqli_connect_error());
}

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
    $request     = json_decode($postdata);
    ChromePhp:: log($request);
    ChromePhp:: log("req");
    $newfirstName  = ($request->newfirstName);
    $newlastName  = ($request->newlastName);
    $newEmail = preg_replace('/[^a-zA-Z0-9\/:@\.\+-s]/','',$request->newEmail);
    ChromePhp:: log("name"+$newfirstName);
    if($newfirstName  == '' || $newlastName == '' || $newEmail == '') return;
    $sql = "INSERT INTO `student_info`(`firstname`, `lastname`, `email`) VALUES ('$newfirstName', '$newlastName', '$newEmail')";
/*      $sql = "DELETE FROM `student_info` WHERE (`firstname`=`$newfirstName`) AND (`lastname`=`$newlastName`) AND (`email`=`$newEmail`)";  */
    ChromePhp:: log($sql);
    mysqli_query($conn,$sql);
}
exit;