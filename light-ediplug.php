<?php
////// Mögliche Geräte
	$path="/var/ediplug-switch/switch.sh " . $_GET['switch'] . " " . $_GET['action'];
	shell_exec($path);
?>