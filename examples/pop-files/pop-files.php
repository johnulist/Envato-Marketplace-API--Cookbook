<?php

error_reporting(E_ALL);


function curl($url) 
{
  if ( empty($url) ) return false;

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  $data = curl_exec($ch);
  curl_close($ch);

  return json_decode($data);
}

$files = curl( "http://marketplace.envato.com/api/edge/popular:themeforest.json" )
		->popular
		->items_last_three_months;

foreach($files as $file) {
	echo "<a href=$file->url><img src=$file->thumbnail></a>";
}