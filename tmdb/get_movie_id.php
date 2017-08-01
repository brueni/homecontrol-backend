<?php
include_once('../include/config.incl.php');
include_once('api.incl.php');

$cleanup[] = "'";
$cleanup[] = '"';

$movies_result = mysql_query("SELECT * FROM video WHERE tmdb_id = 0 ORDER BY id ASC LIMIT 1", $db2);
while ($movies = mysql_fetch_assoc($movies_result)) {
  $search_query = urlencode($movies['titel']);
  $search_language = urlencode("de-de");

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.themoviedb.org/3/search/movie?query=" . $search_query . "&language=" . $search_language . "&api_key=" . $tmdb_api . "",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $result_array = json_decode("$response", true);
    echo "<br><br>";
    if (!isset($result_array['results']['0'])) {
      echo "Title " . $movies['titel'] . " was not found!";
      $update_query = "UPDATE `video` SET
      `tmdb_id` = '1'
      WHERE `video`.`id` = " . $movies['id'] . ""; //'1' is a temporary id to investigate the not found movies later
      mysql_query($update_query, $db2);
    } else {
      $update_query = "UPDATE `video` SET
      `tmdb_id` = '" . $result_array['results']['0']['id'] . "',
      `tmdb_title` = '" . str_replace( $cleanup, "", $result_array['results']['0']['title']) . "',
      `tmdb_original_title` = '" . str_replace( $cleanup, "", $result_array['results']['0']['original_title']) . "',
      `tmdb_posterurl` = '" . $result_array['results']['0']['poster_path'] . "',
      `tmdb_backdropurl` = '" . $result_array['results']['0']['backdrop_path'] . "',
      `tmdb_overview` = '" . str_replace( $cleanup, "", $result_array['results']['0']['overview']) . "',
      `tmdb_releasedate` = '" . $result_array['results']['0']['release_date'] . "'
      WHERE `video`.`id` = " . $movies['id'] . "";
      //echo $update_query;
      echo "Original ID " . $movies['id'] . " / Title " . $movies['titel']  . " -> TMDb ID " . $result_array['results']['0']['id'] . " / Title " . $result_array['results']['0']['original_title'];
      mysql_query($update_query, $db2);
    }
  }
}
 ?>
