<?php
$con = mysqli_connect('localhost','root','amit','student');
if(!$con)
echo 'Not connected';

 
$sql = "SELECT * FROM sub";
$result = mysqli_query($con,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$count = 0;

while ($row = mysqli_fetch_assoc($result)) 
{
	$block = mt_rand(01,54);
	$room = mt_rand(100,150);
	$rno = $block."-".$room;
	if($row['room'] == 0)
		{
			$count = $count + 1;
			$my_sql = "UPDATE sub SET room = "."'$rno'"." where ";
			$my_sql = $my_sql."sid ";
			$my_sql = $my_sql." = ";
			$my_sql = $my_sql.$count;
			$my_sql = $my_sql.";";


			if(!mysqli_query($con,$my_sql))
				{
					echo "Not inserted";
				}
			else
			{
				header("location: admin.php");
			}
		}
}


?>