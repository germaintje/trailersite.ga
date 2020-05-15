<?php
$videospider_url = $_GET['link'];
echo "<iframe src='$videospider_url' width='600' height='400' allowfullscreen='true'></iframe>";
$ip = $_SERVER["REMOTE_ADDR"];
echo $ip;
?>
