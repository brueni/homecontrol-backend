<?php
////// Mögliche Geräte
	$path="/var/mystrom-switch/switch.sh " . $_GET['switch'] . " " . $_GET['action'];
	shell_exec($path);
?>