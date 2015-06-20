<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Smartplate | Eating smart is about to get smarter</title>
<meta name="Description" content="Smartplate is launching soon. Stay Tuned. Eating smart is about to get a whole lot smarter." />
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>   
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script> 
<meta name="p:domain_verify" content="4d9c772553a9e38209a4f52a981034a3"/>
</head>

<body>
	<div id="container">
   	  <div class="header">
       <div class="logo"><img src="images/logo.png" alt=""/> </div>
      </div>
      <div class="header-slide">
      	<div><img src="images/header.jpg" alt=""/></div>
        <div class="headingtext">
        <h1>Eating smart is about to get a whole lot smarter.</h1>
        </div>
      </div>
      <div class="body-container">
      		<h1>We are launching soon.</h1>
            <h2>Please enter your email to stay tuned.</h2>
<div class="thanks">
<?php 
if(isset($_SESSION)){
	if($_SESSION['msg']){
		echo $_SESSION['msg'];	
	}
}	
$_SESSION['msg']='';
?></div>
        <div class="form">
		
		<form action="email.php" name="data_capture" id="data_capture" method="POST" >
			<div class="input-div"><input type="text" placeholder="First Name" name="fname" id="fname" class="validate[required] " /></div>        
			<div class="input-div"><input type="text" placeholder="Last Name" name="lname" id="lname" class="validate[required] " /></div>
			<div class="input-div"><input type="text" placeholder="Email" name="email" id="email" class="validate[required,custom[email]]" /></div>
			<div style="text-align:center;"><input class="submit-btn" type="submit" name="data_capture_form" id="data_capture_form" value="SUBMIT" > </div>
		</form>	
        </div>
    </div>
      </div>
      </div>
<script>
$(document).ready(function() { 
	$("#data_capture").validationEngine({scroll: false, promptPosition: "topLeft:100"});
	$("#data_capture").bind("jqv.field.result", function(event, field, errorFound, prompText) {
		console.log(errorFound)
	})
});
setTimeout(function() {
    $('.thanks').fadeOut('fast');
}, 3000); // <-- time in milliseconds
</script>      
<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 

  ga('create', 'UA-62364080-1', 'auto');

  ga('send', 'pageview');

 

</script>
</body>
</html>