<?php
$script = "/var/homecontrol-backend/set_nrdylight.sh " . $_GET['mode'] . " > /dev/null";
shell_exec($script);
?>
