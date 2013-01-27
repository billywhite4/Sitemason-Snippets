<?php
/*
	* Date formatting using Sitemason XML for items

	* @author     Billy White <billy@sitemason.com>
	* @copyright  2013 Sitemason, Inc.
	* @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
	* @since      File available since 1/26/2013
*/

	# set item path relative to Content XML
	$item = $content_xml->content->element->item;
	
	# date and time variables
	$startDate = $item->item_time->start_date_display;
	$startTime = $item->item_time->start_time_display;
	$endDate = $item->item_time->end_date_display;
	$endTime = $item->item_time->end_time_display;

	# print date and time when present, formatted as January 1, 2013 at 8:30am to January 3, 2013 at 5:30pm
	# reference http://php.net/manual/en/function.date.php for more timestamp formatting options
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