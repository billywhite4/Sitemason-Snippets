# one level
<ul>
<?php
	foreach ($content_xml->nav as $nav) { 
		echo '<li';
		if ($nav->currently_displayed || $nav->current_site) {
			echo ' class="active"';
		}
		echo '><a href="' . $nav->link . '">' . $nav->title . '</a></li>'; 
	}
?>
</ul>



# two levels
<ul>
<?php
	foreach ($content_xml->nav as $nav) { 
		echo '<li';
		if ($nav->currently_displayed || $nav->current_site) {
			echo ' class="active"';
		}
		echo '><a href="' . $nav->link . '">' . $nav->title . '</a>';
		if ($nav->nav) {
			echo '<ul>';
			foreach ($nav->nav as $subnav) {
				echo '<li';
				if ($subnav->currently_displayed) {
					echo ' class="active"';
				}
				echo '><a href="' . $subnav->link . '">' . $subnav->title . '</a></li>';
			}
			echo '</ul>';
		}
		echo '</li>'; 
	}
?>
</ul>



# three levels
<div class="sm_nav">
	<ul class="l1">
		<?php
			$i=0; #set incrementing variable to zero
			foreach ($content_xml->nav as $nav) { #loop through main nav
				if (($i<5) && ($i>0)) { # grab the first 5 items in main nav excluding 
					echo '<li';
					if ($nav->currently_displayed) {
						echo ' class="current"';
					}
					echo '><a href="' . $nav->link . '"';
					if ($nav->currently_displayed) {
						echo ' class="current"';
					}				
					echo'>' . $nav->title . '</a>';
					if ($nav->nav) { # if section has subnavigation, repeat
						echo '<ul class="l2">';
						foreach ($nav->nav as $subnav) {
							echo '<li';
							if ($subnav->currently_displayed) {
								echo ' class="current"';
							}
							echo '><a href="' . $subnav->link . '"';
							if ($subnav->currently_displayed) {
								echo ' class="current"';
							}				
							echo'>' . $subnav->title . '</a>';
							if ($subnav->nav) { # if section has third level nav, repeat
								echo '<ul class="l3">';
								foreach ($subnav->nav as $third) {
									echo '<li';
									if ($third->currently_displayed) {
										echo ' class="current"';
									}
									echo '><a href="' . $third->link . '"';
									if ($third->currently_displayed) {
										echo ' class="current"';
									}				
									echo'>' . $third->title . '</a>';
									echo '</li>';
								}
								echo '</ul>';
							}
							echo '</li>';
						}
						echo '</ul>';
					}
					echo '</li>';
				}
				$i++;
			}
		?>
	</ul>
</div>