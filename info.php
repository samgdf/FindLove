<?php 
if (isset($_GET['start'])) {
	$start = $_GET['start'];
	$handle = @fopen("db.txt", "r");
	if ($handle) {
		$count = 0;
		while (($buffer = fgets($handle, 4096)) !== false) {
			$count++;
			if ($count == $start) {
				$out = '{"users":[{';
				$out .= '"status":1,';
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"name":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"gender":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"age":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"email":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"language":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"college":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r", "\""), '', $buffer);
				$out .= '"quote":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r","\""), '', $buffer);
				$out .= '"religion":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"who":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"comment":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"phone":"'.$buffer.'"';

				$buffer = fgets($handle, 4096);
				if ($buffer == false) {
					$out .= '}, {"status":-1}]}';
					die($out);
				}

				$out .= '}, {"status":1,';
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"name":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"gender":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"age":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"email":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"language":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"college":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r", "\""), '', $buffer);
				$out .= '"quote":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r", "\""), '', $buffer);
				$out .= '"religion":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"who":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"comment":"'.$buffer.'",';
				$buffer = fgets($handle, 4096);
				$buffer = str_replace(array("\n", "\r"), '', $buffer);
				$out .= '"phone":"'.$buffer.'"';
				$out .= '}]}';
				die($out);
			}
		}
		if ($buffer == false)
			die(-1);
		if (!feof($handle)) {
			echo "Error: unexpected fgets() fail\n";
		}
		fclose($handle);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Information</title>
		<link rel="stylesheet" href="form.css" type="text/css" media="screen">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
		<script src="js/jquery-2.1.1.min.js"></script>
	</head>
	<body>
		<script>
			var curLoad = 0;
			loadMore();
			function loadMore() {
				var url = "info.php?start=";
				if (curLoad == 0)
					curLoad += 1;
				else
					curLoad += 22;
				url = url + curLoad;
				$.get( url, function( data ) {
					console.log(data);
					if (data == -1)
						return;

					var obj = JSON.parse(data);
					var a = obj.users[0];
					var b = obj.users[1];
					if (a.gender == "girl")
						$("#gender1").html("Gender: <img src=\"girl.png\" height=\"20\" width=\"20\">");
					else
						$("#gender1").html("Gender: <img src=\"male.png\" height=\"20\" width=\"20\">");
					
					$("#name1").html("Name: "+ a.name);
					$("#age1").html("Age: "+ a.age);
					$("#email1").html("Email: "+ a.email);
					$("#language1").html("Languages: "+ a.language);
					$("#religion1").html("Religion: "+ a.religion);
					$("#college1").html("College: "+ a.college);
					$("#quote1").html("Quote: "+ a.quote);
					$("#who1").html("Looking For: "+ a.who);
					$("#comments1").html("Additional Info: "+ a.comment);

					if (b.status == -1)
						return;

					if (b.gender == "girl")
						$("#gender2").html("Gender: <img src=\"girl.png\" height=\"20\" width=\"20\">");
					else
						$("#gender2").html("Gender: <img src=\"male.png\" height=\"20\" width=\"20\">");
					
					$("#name2").html("Name: "+ b.name);
					$("#age2").html("Age: "+ b.age);
					$("#email2").html("Email: "+ b.email);
					$("#language2").html("Languages: "+ b.language);
					$("#religion2").html("Religion: "+ b.religion);
					$("#college2").html("College: "+ b.college);
					$("#quote2").html("Quote: "+ b.quote);
					$("#who2").html("Looking For: "+ b.who);
					$("#comments2").html("Additional Info: "+ b.comment);
				});
			}
		</script>

		<div class="head">
			<p><a href="index.html" class="nav"><img src="home.png" height="20" width="20"></a> <a href="reg.html" class="nav">Register</a> <a href="info.php" class="nava">More Info</a></p>
		</div>
		<div class="inner">
		<div class="scroll">
			<p id="gender1"></p>
			<p id="name1"></p>
			<p id="age1"></p>
			<p id="email1"></p>
			<p id="language1"></p>
			<p id="religion1"></p>
			<p id="college1"></p>
			<p id="quote1"></p>
			<p id="who1"></p>
			<p id="comments1"></p>
		</div>
		<div class="scroll">
			<p id="gender2"></p>
			<p id="name2"></p>
			<p id="age2"></p>
			<p id="email2"></p>
			<p id="language2"></p>
			<p id="religion2"></p>
			<p id="college2"></p>
			<p id="quote2"></p>
			<p id="who2"></p>
			<p id="comments2"></p>
		</div><br>
		<button id="loadBtn" onclick="loadMore();">Load More</button>
		</div>
		<div class="foot">
			<p>Frontend by <a target="_blank" href="http://www.twitter.com/samgdf">Sam Goldfield</a>, backend by <a target="_blank" href="https://www.facebook.com/Gazmanov">Nikolay Feldman</a>, icons by <a target="_blank" href="https://icomoon.io/linearicons.html">LinearIcons</a>, and photography by <a target="_blank" href="http://www.gotchagoodside.com/">Gotcha Good Side</a>.</p>
		</div>
	</body>
</html>
