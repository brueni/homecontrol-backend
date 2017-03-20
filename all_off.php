<?php
	$path="/var/homecontrol-backend/all_off.sh " . $_GET['mode'] ;
	shell_exec($path);
?>
