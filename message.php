<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$number = $_GET['number'];
$name = $_GET['name'];

system("curl -X POST -H \"Content-Type: application/json\" -d '{\"members\":[{\"nickname\":\"".$name."\", \"phone_number\":\"+1 ".$number."\"}]}' https://api.groupme.com/v3/groups/10669601/members/add?token=9802f6203999013215fe06ee6d143d9f");

?>
