<?php 

require 'keys.php';
include 'ChromePhp.php';
$conn=mysqli_connect($host, $dbuser, $pass, $dbname);

if (mysqli_connect_errno()) {
	
	die("Connection Failed! " . mysqli_connect_error());
}

$data = array();
$sql="SELECT * FROM student_info";


if($result = mysqli_query($conn, $sql))

{
	$count = mysqli_num_rows($result);
	
/*while ($row= mysql_fetch_assoc($result)) 
{
	$data[] = $row;

}*/

 $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
      $data[$cr]['firstname']  = $row['firstname'];
      $data[$cr]['lastname'] = $row['lastname'];
      $data[$cr]['email'] = $row['email'];
      $data[$cr]['id'] = $row['id'];
      $cr++;
  }
}

/*print json_encode($data); */
$json = json_encode($data);
echo $json;

mysqli_close($conn);

?>


