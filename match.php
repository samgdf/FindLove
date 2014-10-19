<?php
$number = $_GET['number'];
$name = $_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Love Found</title>
		<link rel="stylesheet" href="form.css" type="text/css" media="screen">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
		<script src="js/jquery-2.1.1.min.js"></script>
	</head>
	<body>
		<script>
			function sendMessage() {
				
			}
		</script>
		<div class="head">
			<p><a href="index.html" class="nav"><img src="home.png" height="20" width="20"></a> <a href="reg.html" class="nav">Register</a> <a href="#" class="nava">More Info</a></p>
		</div>
		<div class="inner">
		<div id="leftm">
			<p>You are a 100% match with</p>
			<img id="final" src="mesl.png" height="460" width="203"></br></br>
			<a class="btn" href="#" onclick="sendMessage()">Send a message</a> &nbsp&nbsp<a class="btn" href="#">Send your video</a>
			</div>
			<div id="rightm">
			<p>Gender: male</p>
			<p>Name: sam goldfield</p>
			<p>Age: 21</p>
			<p>Email: sam@rutgers.io</p>
			<p>Languages: english, russian</p>
			<p>Religion: jewish</p>
			<p>College: rutgers u</p>
			<p>Quote: how does a blade of grass</br>repay the warmth of the sun?</p>
			<p>Looking For: you</p>
			<p>Additional Info: love tea</p>
			</div>
		</div>
		<div class="foot">
			<p>Frontend by <a target="_blank" href="http://www.twitter.com/samgdf">Sam Goldfield</a>, backend by <a target="_blank" href="https://www.facebook.com/Gazmanov">Nikolay Feldman</a>, icons by <a target="_blank" href="https://icomoon.io/linearicons.html">LinearIcons</a>, and photography by <a target="_blank" href="http://www.gotchagoodside.com/">Gotcha Good Side</a>.</p>
		</div>

		<script>
$('#final').fadeOut("slow", function() {
	$('#final').attr("src","me.png");
	$('#final').fadeIn("slow", function () {
		$("#leftm").animate({ 
					  left: "-=130px",
		}, 1000, function () {
			$("#rightm").css("visibility","visible");
		});
	});
});
		</script>
	</body>
</html>
