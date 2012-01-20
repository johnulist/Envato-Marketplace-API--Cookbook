<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

/*
 * Parses the url, and return a file name for caching
 * @param string $url - The marketplace API url
 * @param string $cache_dir - Path to the cache directory
 */
function parseURL($url, $cache_dir) {
	preg_match('/\w+:(?!\/\/)\w+/i', $url, $cached_file);
	return "$cache_dir/" . $cached_file[0];
}


/*
 * Determines whether the cached file needs to be replaced
 * @param string $cached_file - The name of the cached file
 * @param string $expires - How long, in hours, the file should have been cached
 */
function has_expired($cached_file, $expires) {
	if ( file_exists($cached_file) ) {
		return time() - $expires * 60 * 60 > filemtime($cached_file);
	}
	return true;
}


/*
 * Retrieves the JSON, and saves it to the cache directory.
 *
 * @param string $cache_dir - Path to the dir that contains the cached files 
 * @param string $cached_file - The name to use for the cached file
 * @param string $url - The marketplace url to query
 */
function cache_it($cache_dir, $cached_file, $url) {
	// Create the cache directory if necessary
	!file_exists($cache_dir) && mkdir($cache_dir);

	$files = json_decode( file_get_contents($url) );

	!empty($files) && file_put_contents( $cached_file, json_encode($files) );

	return $files;
}


/*
 * Handles the process of retrieving the JSON from the marketplace and caching it 
 *
 * @param string $url - The marketplace API url
 * @param integer $expires - How long to cache the results in hours
 * @param string $cache_dir - Path to the dir that contains the cached files 
 */
function get_json($url, $expires = 3, $cache_dir = 'cache') {
	$cached_file = parseURL($url, $cache_dir);
	
	if ( has_expired($cached_file, $expires) ) {
		$files = cache_it($cache_dir, $cached_file, $url);
	} else { // use existing cached version
		$files = json_decode( file_get_contents( $cached_file ) );
	}
	
	return $files;
}