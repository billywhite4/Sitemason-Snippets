<?php 
	$staff = $smCurrentTool->getItems();
	
	foreach ($staff as $item) {
		if ($item->getThumbnailImageSize()) {
			$thumbnail = $item->getThumbnailImageSize();
			$url = $thumbnail->getUrl();
		}

		$itemDetails[] = array(
			'last_name' => $item->getTitle(),
			'first_name' => $item->getSubtitle(),
 			'url' => $url,
			'email' => $item->getAuthorEmailAddress(),
			'title' => $item->getCustomFieldWithKey(1),
			'phone' => $item->getCustomFieldWithKey(2),
			'bio' => $item->getCustomFieldWithKey(3),
			'twitter' => $item->getCustomFieldWithKey(4),
			'linkedin' => $item->getCustomFieldWithKey(5)
		);
	}

	uasort($itemDetails, function($a, $b) {
		if($cmp = strnatcasecmp($a['last_name'], $b['last_name'])) return $cmp;
		return strnatcasecmp($a['first_name'], $b['first_name']);
	});	
?>