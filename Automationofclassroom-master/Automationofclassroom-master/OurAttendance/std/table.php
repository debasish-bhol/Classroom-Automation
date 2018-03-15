<?php
      include("conn.php");
      $uid = $_GET['uid'];
      $result = "SELECT sec.id,sec.name,sec.section,sub.sub,sub.dat,sub.room FROM sec join sub on sec.id = sub.id where sec.id = $uid";
      $array = mysqli_query($con,$result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header"><a href="showsyllabus.php">Scan Syllabus</a>
      <div style="margin-left: 1220px;"><a class="navbar-brand" href="Login123.php">Logout</a></div>
    </div>
  </div>
</nav>

<div class="container">     
  <table class="table table-hover">
    <thead>
      <tr style="background-color: gray;">
          <th>ID</th>
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
    </tbody>
  </table>
  <?php mysqli_close($con); ?>
</body>
</html>