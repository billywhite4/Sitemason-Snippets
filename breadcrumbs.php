<?php
/*
	* Breadcrumbs using Sitemason XML

	* @author     Billy White <billy@sitemason.com>
	* @copyright  2013 Sitemason, Inc.
	* @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
	* @since      File available since 2/15/2013
*/
?>

<div class="breadcrumbs">
	<a href="/">Home</a> > 
	<?php
		$delimiter = ' > ';
		$i=1;
		$count=count($content_xml->current_nav->trail->breadcrumb); # determine number of levels of hierarchy 
		foreach ($content_xml->current_nav->trail->breadcrumb as $breadcrumb) { # loop through breadcrumbs from Sitemason XML
			if ($i>1) { # expect first breadcrumb to be home page, and skip
	    		echo '<a href="' . $breadcrumb->link .'">' . $breadcrumb->title .'</a>';
	    		if ($i!=$count) { echo $delimiter; } # print delimiter if not in last position
			}
			$i++;
		}
	?>
</div>
