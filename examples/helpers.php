<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

// parse the url, and return a file name for caching
function parseURL($script_name, $cache_dir) {
	preg_match('/\w+:(?!\/\/)\w+/i', $script_name, $cached_file);
	return "$cache_dir/" . $cached_file[0];
}

function has_expired($cached_file, $expires) {
	if ( file_exists($cached_file) ) {
		return time() - $expires * 60 * 60 > filemtime($cached_file);
	}
	return true;
}

function cache_it($cache_dir, $cached_file, $url) {
	// Create the cache directory if necessary
	!file_exists($cache_dir) && mkdir($cache_dir);

	$files = json_decode( file_get_contents($url) );

	!empty($files) && file_put_contents( $cached_file, json_encode($files) );

	return $files;
}

function get_script($script_name, $expires = 3, $cache_dir = 'cache') {
	$cached_file = parseURL($script_name, $cache_dir);
	
	if ( has_expired($cached_file, $expires) ) {
		$files = cache_it($cache_dir, $cached_file, $script_name);
	} else { // use existing cached version
		$files = json_decode( file_get_contents( $cached_file ) );
	}

	return $files;
}