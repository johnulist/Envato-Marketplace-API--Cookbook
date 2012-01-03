<h1>Popular Files from CodeCanyon Last Week</h1>
<?php

require '../helpers.php';


/* 
Remember: whenever you're working with an API, you must implement
some level of caching. Otherwise, the API will be hammered, you'll
exceed your limit, and your page will take longer to load. Think about it - 
why are you requerying the API for every page request, when the data 
only changes sporadically?
*/

$files = get_json( 
	'http://marketplace.envato.com/api/edge/popular:codecanyon.json'
);

if ( $files ) {
	foreach($files->popular->items_last_week as $file) {
		echo "<a href=$file->url><img src=$file->thumbnail></a>";
	}
}