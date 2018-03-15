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
        $kol="";
   while($rowq=$rows1->fetch_assoc())
   {
       $kol=$rowq['Subject'];
}
    $rr=shell_exec("python face.py $namereg $kol");
    //echo $rr;
    }
    $q1="Select * from markme;";
    $rows=$db->query($q1);
?> 
<?php 
if(isset($_POST['listener']))
{
    $ro=shell_exec("python listenandtalk.py");
}
?>
<?php 
if(isset($_POST['caller']))
{
    $ro=shell_exec("python speechtell.py");
}
if(isset($_POST['listener']))
{
    $re=shell_exec("python speechspeak.py");
}
if(isset($_POST['caller']))
{
    $re=shell_exec("python SpeakerFinal.py");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<style>
        .myto
        {
            height:20vh;
            overflow-y: scroll;
        }

body {
    font-family: "Lato", sans-serif;
    margin: 0 ;
    padding: 0;
    overflow: hidden;
}

.sidenav {
    overflow : hidden;
    height: 100%;
    width: 180px;
    position: fixed;
    z-index: 1;
    background: #457fca;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #5691c8, #457fca);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #5691c8, #457fca); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    top: 0;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #ffffff;
    display: block;
}

.sidenav a:hover {
    color: #ffffff;
}

.main {
    margin-left: 300px; /* Same as the width of the sidenav */
    font-size: 15px; /* Increased text to enable scrolling */
    padding: 0px 5px;
}



@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
nav {
    position:fixed;
    width: 100%;

    display: block;
    margin-top: 0%;
    height: 10%;
    font-size: 20px;
    background-color: #212121;
    margin-left: -20%;
    
}
nav ul,
nav li {
    float: right;
    list-style: none;
    padding: 0;
    margin: 0;
    padding-right: 10%;
}
nav a {
    
    color: #fff;
    text-decoration: none;
}
nav > ul > li {
    display: inline-block;
    position: relative;
    margin: 1em
}
nav > ul > li > a {
    padding-bottom: 50px;
}
nav > ul > li > ul {
    display: none;
    position: absolute;
    background-color: #000;
    top: 50px;
    padding: 10px 0;
}
nav > ul > li > ul > li {
    white-space: nowrap;
    padding: 7.5px 15px;
}
nav > ul > li > ul > li > a {
    display: block;
}
nav > ul > li > ul > li > a:hover {
    text-decoration: underline;
}
nav > ul > li > ul:after {
    position: absolute;
    left: 50%;
    margin-left: -20px;
    top: -6px;
    width: 0;
    height: 0;
    content:'';
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-bottom: 20px solid #000000;
}
nav > ul > li:hover > ul {
    display:block;
}
    input[type="text"]{
        height:55px;
        font-size:25px;
    }
.block{
    height: 25vh;
}
.block>a{
    position: relative;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
}
.sections{
    margin-top: -1%;
    min-height: 100vh;
    color: #000000;
}
    button.take-photo{
    
    width:300px;
    outline: none;
    color: #ffffff;
    background-color:#212121;
    padding: 10px;
    text-transform: uppercase;
    cursor: pointer;
    font-size: 10px;
    border: none;
    display: block;
    position: relative;
    border-radius: 30px;
    box-shadow:0 8px #616161;
}

.take-photo:hover{
    box-shadow:0 6px #616161;
    top:2px;
  }
  .take-photo:active{
    box-shadow:0 0 #616161;
    top:8px;
  }
</style>
</head>
<body>

<div class="sidenav">
    <div class="block">
        <center>
        <a  class="nav-link scroll-link" href="#attendence">Attendence</a>
    </center>
    </div>
    <div class="block">
        <center>
        <a  class="nav-link scroll-link" href="#lecture">Lecture</a>
        </center>
    </div>
    <div class="block">
        <center>
        <a clasks="nav-link scroll-link" href="#chat">Chat</a>
    </center>
    </div>    
    <div class="block">    
        <center>
        <a  class="nav-link scroll-link" href="#studentgraph">Student Graph</a>
        </center>
    </div>
</div>

<div class="main">
        <nav>
                <ul>
                    <li>
                        <a href="#">Options</a>
                        <ul>
                            <li><a href="stud.php"></a>Student Analysis</li>
                            <li><a href="taught.php">Uploads</a></li>
                            <li><a href="Logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="sections" id="attendence" style="padding:5%;">
                    <h2 class="text-center uw">ATTENDANCE MARK APPLICATION</h2>
        <div class="row">
            <div>
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
                    <?php $kol=$rowq['Subject'];?>
                    <td><?php echo $rowq['Subject'] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
            </div>
            </div>
            <div class="sections" id="show" style="padding:2%;">
                   <div>
            <form action="ProfileRule.php" method="post">
                <table class="table  col-md-12 table-hover uw">
                
                        <input type="text" placeholder="Enter Registration Number" name="reg" class="form-control">
                        
                    
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
                    <th>Subject</th>
                </tr>
                                    <?php while($row=$rows->fetch_assoc()):?>
                        <tr>
                    <th>
                                
                                <?php 
                                $my=$row['img'];
                                ?>
                                <img src='<?php echo $my ?>' class='img img-circle' width="40px">
                            </th>
                            <th>
                                <?php echo $row['Sno'] ?>
                            </th>
                            <td>
                                <?php echo $row['Studentname']?>
                            </td>
                             <td>
                                <?php echo $row['attime']?>
                            </td>
                            <td>
                                <?php echo $row['Subject']?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
            </table>
        </div>
        </div>
        </div>
            </div>
            <div class="sections" id="lecture" style="padding:10%;">
                <h1>Today's Lecture</h1>
<h4>Data analysis, also known as analysis of data or data analytics, is a process of inspecting, cleansing, transforming, and modeling data with the goal of discovering useful information, suggesting conclusions, and supporting decision-making. Data analysis has multiple facets and approaches, encompassing diverse techniques under a variety of names, in different business, science, and social science domains.
    Data mining is a particular data analysis technique that focuses on modeling and knowledge discovery for predictive rather than purely descriptive purposes, while business intelligence covers data analysis that relies heavily on aggregation, focusing on business information.In statistical applications data analysis can be divided into descriptive statistics, exploratory data analysis (EDA), and confirmatory data analysis (CDA). EDA focuses on discovering new features in the data and CDA on confirming or falsifying existing hypotheses. Predictive analytics focuses on application of statistical models for predictive forecasting or classification, while text analytics applies statistical, linguistic, and structural techniques to extract and classify information from textual sources, a species of unstructured data. All are varieties of data analysis.</h4>
                <br>
                <div class="row">
                    <center>
                <form method="post">
                <button  type="submit" id="photo-button" class="take-photo div-md-4" name="caller">Zai Speak!</button>
                </form>
                    <br>
                <form method="post">
                <button type="submit" id="photo-button" class="take-photo div-md-4" name="listener">Zai Q&amp;A!</button>
                </form>
                        <br>
                <form method="post">
                <button type="submit" id="photo-button" class="take-photo" name="placer">Zai Support!</button>
                </form>
                        </center>
                </div>
</div>
    
<div class="sections" id="chat" style="padding:5%;">
    <div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="http://chatcrook.tk/"></iframe>
</div>
</div>
    
<div class="sections" id="studentgraph" style="padding:30%; font-size:30px; font-weight: strong;" >
 Coming Soon
</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="app.js"></script>
<script>
      $(function(){
    $('.scroll-link').on('click',function(){
    $("html, body").animate({scrollTop: $($(this).attr("href")).offset().top},500);
    return false;
  })
});
    </script>
</body>
</html> 