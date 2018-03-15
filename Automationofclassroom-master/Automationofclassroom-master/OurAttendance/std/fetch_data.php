<?php
$con = mysqli_connect('localhost','root','amit','student');
if (!$con) {
	echo "Not Connected";
}

$UserID = $_POST['userid'];
$Name = $_POST['Name'];


$sql = "SELECT id,name from sec where id = $UserID";
$result = mysqli_query($con,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
}


$array = mysqli_fetch_array($result);

print_r($array);

if($array['id'] == $UserID && $array['name'] == $Name)
{
	header("location: table.php?uid=$UserID");
}

elseif ($UserID == 11609090 && $Name == "Ravi") {
	header("refresh:0;url=admin.php?");
}

?>