<?php
	$item = $content_xml->content->element->item as 
	
	$startDate = $item->item_time->start_date_display;
	$startTime = $item->item_time->start_time_display;
	$endDate = $item->item_time->end_date_display;
	$endTime = $item->item_time->end_time_display;

	echo '<span>' . date("F j, Y",strtotime($startDate));
	if ($item->item_time->start_time_display) {
		echo ' at ' . $startTime;
	}
	if ($item->item_time->end_date_display) {
		echo ' to ' . date("F j, Y",strtotime($endDate));
	}
	if ($item->item_time->end_time_display) {
		echo ' at ' . $endTime;
	}
	echo '</span>';
?>