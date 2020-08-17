<?php
$posts = new Cuztom_Post_Type( 'post' );

$posts->add_meta_box(
  'faculty',
  'Chooses related faculty member(s)',
    array(
        array(
          'name'          => 'faculty',
          'label'         => 'Select Faculty Member(s)',
          'type'          => 'post_select',
          'args'          => array(
	            'post_type' => 'faculty',
	            'posts_per_page'	=> -1,
	            'show_option_none' => 'None',
	            'meta_key'  => '_info_lname',
              'orderby'	=> '_info_lname',
              'order'       => 'ASC'
			        ),
					'repeatable'		=> true
       )
    )
);	

$posts->add_meta_box(
    'page',
    'Choose related page',
    array(
        array(
          'name'          => 'select',
          'label'         => 'Select Page(s)',
          'type'          => 'post_select',
          'repeatable'    => 'true',
          'args'          => array(
              'post_type'     => 'page',
              'posts_per_page'=> -1,
              'orderby'	=> 'title',
              'order'       => 'ASC',
              'show_option_none' => 'None'
					)
        )
    )
);