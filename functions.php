<?php

//if ( $_POST['id'] && $_POST['file_name'] ) {
	echo htmlspecialchars(
		file_get_contents($_POST['href'])
	);
//}