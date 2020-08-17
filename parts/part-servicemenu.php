<?php

$ancestorID = get_post_top_ancestor_id($post);
$parentID = get_the_id($post->post_parent);

if($post->post_parent){
	$servicetitle = get_the_title($ancestorID);
	$servicelink = get_permalink($ancestorID);
	$servicechildren = wp_list_pages("title_li=&child_of=".$ancestorID."&depth=2&echo=0&sort_order=ASC");
	$servicethistitle = get_the_title($post->ID); // This is for loading faculty page specific templates
}
else
	{
	$servicetitle = get_the_title($parentID);
	$servicelink = get_permalink($parentID);
	$servicechildren = wp_list_pages("title_li=&child_of=".$parentID."&depth=1&echo=0&sort_order=ASC");
}      
      
?>

<ul class="nav nav-service">
	<?php
		echo '<li><a href="'.$servicelink.'" title="Go to that page">'.$servicetitle.'</a></li>';
		if(!empty($servicechildren)){
			echo $servicechildren;
		}	
	?>
</ul>