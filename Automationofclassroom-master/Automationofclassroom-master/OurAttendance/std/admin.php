<?php
      include("conn.php");
      $result = "SELECT sec.id,sec.name,sec.section,sub.sub,sub.dat,sub.room FROM sec join sub on sec.id = sub.id";
      $array = mysqli_query($con,$result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="allocate.php">Allocate Room</a>
      <p style="margin-left: 1220px;" ><a class="navbar-brand" href="Login123.php">Logout</a></p>
    </div>
  </div>
</nav>

<div class="container" style="overflow-y: scroll; height: 300px; margin-top: 100px;">     
  <center><table class="table table-hover" >
    <thead class="thead-inverse">
      <tr style="background-color: gray; color: white">
          <th style="color: ">ID</th>
          <th>NAME</th>
          <th>SECTION</th>
          <th>SUBJECT</th>
          <th>DATE</th>
          <th>ROOM</th>
       </tr>
    </thead>
    <tbody>
     <?php
            while ($row = mysqli_fetch_assoc($array))
            {
             echo "<tr><td>";
             echo $row['id'];
             echo "</td><td>";
             echo $row['name'];
             echo "</td><td>";
             echo $row['section'];
             echo "</td><td>";
             echo $row['sub'];
             echo "</td><td>";
             echo $row['dat'];
             echo "</td><td>";
             echo $row['room'];
             echo "</td></tr>";
            }
     ?>
    </tbody></div></center>
  </table>
  <?php mysqli_close($con); ?>
</body>
</html>