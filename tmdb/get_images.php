<?php
include_once('../include/config.incl.php');
include_once('api.incl.php');

$base_url = "http://image.tmdb.org/t/p/";
$base_folder = "/mnt/nas1/_tmdb_cover/"; //tbd

$poster_path = "original";
$backdrop_path = "original";

$movies_result = mysql_query("SELECT * FROM video WHERE tmdb_id > 1 ORDER BY tmdb_id ASC LIMIT 1", $db2);
while ($movies = mysql_fetch_assoc($movies_result)) {
  $poster_url = $base_url . $poster_path . $movies['tmdb_posterurl'];
  $backdrop_url = $base_url . $backdrop_path . $movies['tmdb_backdropurl'];
  $dst_folder = $base_folder . $movies['id'];
  if (!file_exists($dst_folder)) {
    mkdir($dst_folder, 0777, true);
  }
  $destination_poster = $base_folder . $movies['id'] . "/" . $movies['id'] . "_poster.jpg";
  $destination_backdrop = $base_folder . $movies['id'] . "/" . $movies['id'] . "_backdrop.jpg";

  $ch = curl_init($poster_url);
  $fp = fopen($destination_poster, 'wb');
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  curl_close($ch);
  fclose($fp);

  $ch = curl_init($backdrop_url);
  $fp = fopen($destination_backdrop, 'wb');
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  curl_close($ch);
  fclose($fp);
}


?>
