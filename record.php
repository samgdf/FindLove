<?php
$file = fopen("db.txt","a");
	fwrite($file,$_GET['name']."\n".$_GET['gender']."\n".$_GET['age']."\n".$_GET['email']."\n".$_GET['language']."\n".$_GET['college']."\n".$_GET['quote']."\n".$_GET['religion']."\n".$_GET['who']."\n".$_GET['comment']."\n".$_GET['phone']."\n");
fclose($file);
?> 
