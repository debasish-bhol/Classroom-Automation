<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="Login123.css">
</head>
<body>
<div id="login">
<h1><strong>Welcome.</strong> Please login.</h1>
<form action="fetch_data.php" method="POST">
<fieldset>
<p><input type="text" name="userid" required value="UserID" onBlur="if(this.value=='')this.value='UserID'" onFocus="if(this.value=='UserID')this.value='' " maxlength="8"></p>
<p><input type="text" name="Name" required value="Name" onBlur="if(this.value=='')this.value='Name'" onFocus="if(this.value=='Name')this.value='' "></p>
<p><a href="#">Forgot Password?</a></p>
<p><input type="submit" value="Student Login"></p>
<p><span class="btn-round">or</span></p>
<p><input type="submit" value="Admin Login"></p>
</form>
</fieldset>
</div> <!-- end login -->
</body>
</html>