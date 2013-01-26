<div class="breadcrumbs">
	<a href="/">Home</a> > 
	<?php
		$i=1;
		$count=count($content_xml->current_nav->trail->breadcrumb);
		foreach ($content_xml->current_nav->trail->breadcrumb as $breadcrumb) {
			if ($i>1) {
	    		echo '<a href="' . $breadcrumb->link .'">' . $breadcrumb->title .'</a>';
	    		if ($i!=$count) { echo ' > '; }
			}
			$i++;
		}
	?>
</div>
