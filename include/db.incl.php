<?php
/*$srv1off = "0";

$db = mysql_connect($servers['host'], $servers['user'], $servers['password']);
if (!$db)
{
	$srv1off = "1";
	//echo "Keine Verbindung zu Datenbank-Server $servers[host] m�glich! Bitte kontaktieren Sie den Administrator";
	//exit;
}
else
{
	if(mysql_select_db($servers['db'], $db))
	{
			mysql_query("SET NAMES 'utf8'", $db);
	}
	else
	{
		echo "Datenbank \"$servers[db]\" wurde nicht gefunden. Bitte kontaktieren Sie den Administrator<br>";
		exit;
	}
}
*/
$db2 = mysql_connect($servers['host2'], $servers['user2'], $servers['password2'], true);
if (!$db2)
{
	echo "Keine Verbindung zu Datenbank-Server $servers[host2] moeglich!";
	exit;
}
else
{
	if(mysql_select_db($servers['db2'], $db2))
	{
		mysql_query("SET NAMES 'utf8'", $db2);
	}
	else
	{
		echo "Datenbank \"$servers[db2]\" wurde nicht gefunden. Bitte kontaktieren Sie den Administrator<br>";
		exit;
	}
}

?>
