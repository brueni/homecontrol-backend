<?php

function wol($broadcast, $mac)
{
    $mac_array = split(':', $mac);

    $hwaddr = '';

    foreach($mac_array AS $octet)
    {
        $hwaddr .= chr(hexdec($octet));
    }

    // Create Magic Packet

    $packet = '';
    for ($i = 1; $i <= 6; $i++)
    {
        $packet .= chr(255);
    }

    for ($i = 1; $i <= 16; $i++)
    {
        $packet .= $hwaddr;
    }

    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    if ($sock)
    {
        $options = socket_set_option($sock, 1, 6, true);

        if ($options >=0)
        {
            $e = socket_sendto($sock, $packet, strlen($packet), 0, $broadcast, 7);
            socket_close($sock);
        }
    }
}

////// Broadcast-Adresse
$bc = "192.168.11.255";

////// Mögliche Geräte
$devices = array ( 'nas3270' => '00:1c:c0:e4:ee:14',
                 'srv1' => '00:1e:8c:e4:bc:8f',
                 'htpc' => '00:30:1b:44:73:00' );

if ($_GET['action'] == 'on') {
  $hw = $devices[$_GET['dev']];
  wol($bc, $hw);
} elseif ($_GET['action'] == 'off') {
  $script = "/var/homecontrol-backend/shut" . $_GET['dev'] . ".sh";
  shell_exec($script);
}

?>
