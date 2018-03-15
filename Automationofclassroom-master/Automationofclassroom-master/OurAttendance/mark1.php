<html>
<?php 
    include 'db.php';
session_start();  
if(!$_SESSION['uname'])  
{  
    header("Location: login1.php");//redirect to login page to secure the welcome page without login access.  
} 
if(!isset($_SESSION['timeout']))
{
$_SESSION['timeout'] = time();
}
else if (time() - $_SESSION['timeout'] > 520)
{
session_destroy();
die("Session Expired!!! Please login again to continue");
header("Location: login1.php");
}
    ini_set('max_execution_time', 300); 
    $uid=$_SESSION['uname'];
    $q2="Select * from teachers where teachid='$uid'";
    $rows1=$db->query($q2);
    if (isset($_POST['camera'])){
    $namereg=$_POST['reg'];
    $rr=shell_exec("python face.py $namereg");
    //echo $rr;
    }
    $q1="Select * from markme;";
    $rows=$db->query($q1);
    ?>                                    
<head>
    <title>
        Attendance: Mark
    </title>
    <style>
        .myto
        {
            height:20vh;
            overflow-y: scroll;
        }
    </style>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        .uw {
            font-family: 'Corbel', sans-serif;
            padding-top: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center uw">ATTENDANCE MARK APPLICATION</h2>
        <div class="row">
            <div>
            <a href="Logout.php" class="btn btn-info pull-right">Give Lecture</a>
            <a href="Logout.php" class="btn btn-info pull-right">Logout</a>
            <table class="table table-hover uw">
                <?php while($rowq=$rows1->fetch_assoc()):?>
                <tr>
                    <th>Teacher Name</th>
                    <td><?php echo $rowq['teachername'] ?></td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td><?php echo $rowq['section'] ?></td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td><?php echo $rowq['Subject'] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
            </div>
            <div>
            <form action="ProfileRule.php" method="post">
                <table class="table table-hover uw">
                    <tr>
                        <td colspan="2"><input type="text" placeholder="Enter Registration Number" name="reg" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="Submit" value="Mark" name="camera" class="btn btn-success"></td>
                    <td><input type="button" name="camera" value="Cancel" class="btn btn-danger"></td>
                    </tr>
                </table>
            </form>
            <hr>
            <h2 class="text-center uw">MARKED STUDENTS</h2>
            <div class="myto">
            <table class="table table-stripped uw">
                <tr>
                    <th>Image</th>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Time</th>
                </tr>
                                    <?php while($row=$rows->fetch_assoc()):?>
                        <tr>
                          <!--  <th>
                                
                                <?php 
                                $my=$row['img'];
                                ?>
                                <img src='<?php echo $my ?>' class='img img-circle' width="40px">
                            </th>-->
                            <th>
                                <?php echo $row['Sno'] ?>
                            </th>
                            <td>
                                <?php echo $row['Studentname']?>
                            </td>
                             <td>
                                <?php echo $row['attime']?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
            </table>
        </div>
        </div>
        </div>
    </div>
    </body>
</html>