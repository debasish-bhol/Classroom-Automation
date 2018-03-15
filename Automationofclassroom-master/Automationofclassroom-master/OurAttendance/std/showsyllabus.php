
<html>
<head>
<title>
    show
</title>
<?php 
if(isset($_POST['caller1']))
{
    $r=shell_exec("python tk1.py");
    echo $r;
}
?>
<style>
    
body {
    font-family: "Lato", sans-serif;
    margin: 0 ;
    padding: 0;
    overflow: hidden;
background: #4e54c8;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #8f94fb, #4e54c8);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #8f94fb, #4e54c8); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
.white-button{
  outline: hidden;
  display: block;
  color: #000000;
  background: #ffffff;
  padding: 12px 17px;
  font-family: 'Work Sans', sans-serif;
  border: 3px solid #000000;
  font-size: 14px;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
  border-radius: 4px;
  display: inline-block;
  text-align: center;
  cursor: pointer;
  box-shadow: inset 0 0 0 0 #31302B;
  -webkit-transition: all ease 0.8s;
  -moz-transition: all ease 0.8s;
  transition: all ease 0.8s;
}
.white-button:hover {
  box-shadow: inset 205px 0 0 0 #000000;
  color: #ffffff;
}
    .selectWrapper {
    width: 100%;
    overflow: hidden;
    position: relative;
    border: 1px solid #bbb;
    border-radius: 2px;
}

    .selectWrapper select{
        width:400px;
    }
    .selectWrapper select {
        padding: 12px 40px 12px 20px;
        font-size: 18px;
        line-height: 18px;
        width: 100%;
        border: none;
        box-shadow: none;
        background: transparent;
        background-image: none;
        -webkit-appearance: none;
        outline: none;
        cursor: pointer;
        -moz-appearance: none;
        text-indent: 0.01px;
        text-overflow: ellipsis;
    }
</style>
     <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
       <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
</head>
<body>
    <center><i class="fa fa-code"  style="font-size:50px;"></i><font family="Lato" size="6px"><b>Upload Via QR Code</b></font><i class="fa fa-code"  style="font-size:50px;"></i></center>
    <br> <center><i class="fa fa-qrcode"  style="font-size:340px;"></i></center>
                <div class="row">
                    <center>
                <form method="post">
                    <center>
                <h5>Choose Subject: </h5>
                        <div class="selectWrapper">
                <select class="form-control">
                <option name="os.png">OS Lab</option>
                <option name="os.png">Java</option>
                <option name="os.png">Networking</option>
                </select>
                            </div>
                        </center>
    
                <button  type="submit" id="photo-button" class="white-button div-md-4" name="caller1">Show Syllabus</button>
                </form>
                    <br>
                        </center>
                </div>
</body>
</html>