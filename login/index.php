<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset= utf=8" />
<title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/style_login.css" />
        <link rel="shortcut icon" href="images/logoptsb.png" />
        	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">


<script type="text/javascript">
	function validasi(form){
	if (form.username.value == ""){
	alert("Anda belum mengisikan Username");
	form.username.focus();
	return (false);
	}
     
	if (form.password.value == ""){
	alert("Anda belum mengisikan Password");
	form.password.focus();
	return (false);
	}
	return (true);
	}
</script>

</head>

<body OnLoad="document.login.username.focus();" bgcolor="#00FF33">
<div id="main">

<!-- Header -->
<div id="header"><img src="images/semenbaturaja.png" alt="PT Semen Baturaja (Persero) Tbk" /></div>

<!-- Middle -->
<div id="middle">
<form id="form-login" name="login" method="post" action="cek_login.php" onSubmit="return validasi(this)">
  
  <img src="images/img_login_user_ptsb.png" align="absmiddle" class="img_user" />
  <input type="text" name="username" size="29" id="input" placeholder="Username" />
  <br />
	
  <img src="images/img_login_pass_ptsb.png" align="absmiddle" class="img_pass" />
  <input type="password" name="password" size="29" id="input" placeholder="Password" />
  <br />
  
  <input name="Submit" type="submit" value="Submit" src="images/img_submit_ptsb.png" id="submit" align="absmiddle" />
</form>
</div>

<!-- don't Change ;) -->
<div class="clear"></div>

<!-- Footer -->
<div id="footer">Copyright 2015 &copy; FN & DP </div>

<!-- vertical_effect -->
<div id="vertical_effect">&nbsp;</div>

</div>
<script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(window).load(function(){
			$('.content').fadeIn(900);
		});
	});
</script>

</body>
</html>
