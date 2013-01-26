<?php
	foreach ($content_xml->content->element->item as $item) {
		$match = false;
		foreach ($item->tags as $tag) {
			if ((string)$tag->name == (string)$bldg) {
				$match = true;
				continue;
			}
		}
		if ($match) {
			echo '<li>' . $item->title . '</li>';
		}
	}
?>