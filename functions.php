<?php

if ( isset($_POST['href']) && !file_exists($_POST['href']) ) {
	echo htmlspecialchars(
		file_get_contents($_POST['href'])
	);
}