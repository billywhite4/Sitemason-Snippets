<?php
	#set $layout variable for various pages
	if ($content_xml->current_nav->id == 'clBm48') {
		$layout = 'home';
	} elseif ($content_xml->current_nav->id == 'btsDwk') {
		$layout = 'photos';
	} elseif ($content_xml->current_nav->id == 'cz8xcA') {
		$layout = 'news';
	} elseif ($content_xml->current_nav->id == 'lbM85q' || $content_xml->current_nav->id == 'e1P2pO') { # staff and farms pages
		$layout = 'staff';
	} elseif ($content_xml->current_nav->id == 'fJoDG8' || $content_xml->current_nav->site_id == 'jyghz2') {
		$layout = 'menus';
	} elseif ($content_xml->current_nav->site_id == 'aWiE8w') {
		$layout = 'wines';
	} elseif ($content_xml->current_nav->site_id == 'gP4xmo') {
		$layout = 'about';
	} elseif ($content_xml->current_nav->site_id == 'dEOqSQ') {
		$layout = 'information';
	} else {
		$layout = 'interior';
	}
?>

<?php
	#main switch for content areas
	if ($layout == 'home') {
		include('inc/home.php');
	} elseif ($layout == 'photos') {
		include('inc/photos.php');
	} else {
		include('inc/interior.php');
	}
?>
