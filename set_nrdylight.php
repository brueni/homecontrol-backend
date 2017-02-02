<?php
$script = "/var/homecontrol-backend/set_nrdylight.sh " . $_GET['mode'];
shell_exec($script);
?>
