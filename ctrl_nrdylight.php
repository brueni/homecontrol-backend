<?php
$mode1 = $_GET['mode'];
$scene1 = $_GET['scene'];
$brightness1 = $_GET['brightness'];
$repeat1 = $_GET['repeat'];
$script = "/var/homecontrol-backend/ctrl_nrdylight.sh $mode1 $scene1 $brightness1 $repeat1";
shell_exec($script);
?>
