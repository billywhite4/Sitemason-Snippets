<?php
	# loop through home page slides to generate rotator
	foreach ($content_xml->content->element->item as $item ) {
		echo '<h2><a href="' . $item->full_url . '">' . $item->title. '</a></h2>';
		echo $item->summary;
	}
?>


<?php
	# loop through first 3 of undefined number
	$i=0;
	foreach ($content_xml->content->element->item as $item ) {
		if ($i<3) {
			echo '<h2><a href="' . $item->full_url . '">' . $item->title. '</a></h2>';
			echo $item->summary;
		}
		$i++;
	}
?>


<?php
	# loop through predefined number of SideContent items using /set. Will only print 3. 
	$blog = new SideContent($site_url . '/page-path/list/set/3&toolxml');
	$blog_xml = $blog->getXML();
	
	foreach ($blog_xml->content->data->item as $item ) {
		echo '<h2><a href="' . $item->full_url . '">' . $item->title. '</a></h2>';
		echo $item->summary;
	}
?>