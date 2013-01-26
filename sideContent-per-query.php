- $site_url is generally defined at the top of template.php
- A query to the page might look like http://www.your-site.com/?query=a
- Any custom query is always added to the <current_nav> XML as <form>
- Useful when you need to load custom side content based on options on a seperate page.
- This example will load items in your Side Content tagged with your custom query.


<?php
	if ($content_xml->current_nav->form->query == 'a') {
		$query = 'accordion';
	} elseif ($content_xml->current_nav->form->query == 'b') {
		$query = 'bassoon';
	} elseif ($content_xml->current_nav->form->query == 'c') {
		$query = 'clarinet';
	}
	
	$url = $site_url . '/page-path?xtags=' . $query . '&toolxml';
	
	$gallery = new SideContent($url);
	$gallery_xml = $gallery->getXML();
?>