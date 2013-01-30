<?php
/*
	* Intelligent pagination using Sitemason XML for item lists

	* @author     Billy White <billy@sitemason.com>
	* @copyright  2013 Sitemason, Inc.
	* @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
	* @since      File available since 1/26/2013


	# default styles
	ul.pagination { display: block; height: 24px; margin-left: -5px; }
	ul.pagination li { float: left; display: block; height: 24px; color: #999; font-size: 14px; margin-left: 5px; }
	ul.pagination li a { display: block; padding: 3px 7px 0px; color: #555; }
	ul.pagination li:hover a,
	ul.pagination li a:focus { background: #e6e6e6 }
	ul.pagination li.unavailable a { cursor: default; color: #999; }
	ul.pagination li.unavailable:hover a,
	ul.pagination li.unavailable a:focus { background: transparent }
	ul.pagination li.current a { background: #990003; color: white; font-weight: bold; cursor: default; }
	ul.pagination li.current a:hover { background: #333 }
*/
?>

<ul class="pagination">
<?php
	# some application variables
	$element = $content_xml->content->element; # set path relative to Content XML
	$query_string = $element->query;
	$query_string = preg_replace('/"/', '%22', $query_string);

	# primary function to print individual page links
	function printItems($element, $i) {
		global $query_string;
		echo '<li';
		if ($element->links->list->set_page == $i) {
			echo ' class="current"';
		}
		echo '><a href="'. $element->base_url .'/list/set/'. $element->set .'/'. (($element->set * ($i - 1)) + 1);
		if ($query_string) {
			echo  '?'. $query_string;
		}
		echo '">'. $i .'</a></li>';
	}
	
	# prints unavailable dots appended to first page links or prepended to last page links
	function unavailable() {
		echo '<li class="unavailable">&hellip;</li>';
	}
	
	# previous page link
	echo '<li class="arrow';
	if (!($element->links->list->previous_set)) {
		echo ' unavailable';
	} 
	echo '"><a href="';
	if ($element->links->list->previous_set) {
		echo $element->base_url . $element->links->list->previous_set;
		if ($query_string) {
			echo  '?'. $query_string;
		}
	}
	echo '">&laquo;</a></li>';
	
	# useful variables
	$total_pages = ceil($element->total_items / $element->set); # total number of pages of items
	$next_to_last_page = $total_pages - 1; # the number of total pages minus one
	$set_page = $content_xml->content->element->links->list->set_page; # the current page number

	# loops through total number of pages and handles use cases
	for ($i = 1; $i <= $total_pages; $i++) {
		# displays first three and last two page links, with the middle abbreviated with unavailable dots by default
		if ($i<=3) {
			printItems($element, $i);
			if ($i==3 && $set_page==3 && $total_pages!=3 && $total_pages!=4) {
				printItems($element, 4);
			}
		}
		
		# print unavailable dots after 3rd page link except when on 4th or 5th
		if ($i==3 && $set_page!=4 && $set_page!=5 && $total_pages>5 && ($set_page!=3 && $i!=4)) {
			unavailable();
		}
		
		# primary logic loop defining which page links to display when
		if ($i<6 && $i==$set_page) { #special consideration for 4th and 5th page links
			if ($i==4) {
				printItems($element, 4);
				if ($total_pages!=4 && $total_pages !=5){
					printItems($element, 5);
				}
			} elseif ($i==5) {
				printItems($element, 4);
				printItems($element, 5);
				printItems($element, 6);
			} 
		} elseif(($i == $next_to_last_page || $i == $total_pages) && $total_pages>3 && ($set_page!=5 || $total_pages!=6)) { # special considerations for last and next-to-last page links
			if ($set_page==$next_to_last_page && $i==$next_to_last_page) {
				printItems($element, $set_page-1);
			}
			if ($total_pages==4) { # special considerations for total pages between 4-7
				printItems($element, 4);
				break;
			} elseif ($total_pages==5) {
				if ($set_page == 4) {
					
				} elseif ($set_page!=3) {
					printItems($element, 4);
				}
				printItems($element, 5);
				break;
			} elseif ($total_pages==6) {
				if ($set_page!=4) {
					printItems($element, 5);
				}
				printItems($element, 6);
				break;
			} elseif ($total_pages==7) {
				if ($set_page!=5) {
					printItems($element, 6);
				}
				printItems($element, 7);
				break;
			} else {
				printItems($element, $i);
			}
		} elseif ($set_page>5 && $i>5 && $set_page<($total_pages-2) && $i<($total_pages-2) && $i==$set_page) { # handles all page links above five and less than second-from-last
			printItems($element, ($set_page-1));
			printItems($element, $set_page);
			printItems($element, ($set_page+1));
		} elseif ($set_page==$total_pages-2 && $i==$total_pages-2) { # special consideration for second-from-last
			printItems($element, $set_page-1);
			printItems($element, $set_page);
		}
		
		# preceding unavailable dots before last two page links when page is not directly in series with either first or last page links
		if ($set_page>2 && $i==($total_pages-2) && $set_page!=$total_pages-3 && $set_page!=$total_pages-2 && $set_page!=$next_to_last_page && $set_page!=$total_pages) {
			unavailable();
		}
		
	}
	
	# next page link
	echo '<li class="arrow';
	if (!($element->links->list->next_set)) {
		echo ' unavailable';
	} 
	echo '"><a href="';
	if ($element->links->list->next_set) {
		echo $element->base_url . $element->links->list->next_set;
		if ($query_string) {
			echo  '?'. $query_string;
		}
	}
	echo '">&raquo;</a></li>';
?>		
</ul>