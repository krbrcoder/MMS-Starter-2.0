<?php
$pages = new Cuztom_Post_Type( 'page' );

/*---------------------------------------------------------------------------------------
  ----------------------------------- HOMEPAGE AREA -------------------------------------
  ---------------------------------------------------------------------------------------*/
$pages->add_meta_box(
    'facultypageoptions',
    'Faculty Page Options',
      array(
      		array(
            'name'          => 'livesearch',
            'label'         => 'Show Live Search?',
            'type'          => 'yesno',
            'default_value' => 'no'
      		),
      		array(
            'name'          => 'sidebar_left',
            'label'         => 'Show Left Sidebar',
            'type'          => 'yesno',
            'default_value' => 'yes'
      		),
/*      		array(
            'name'          => 'sidebar',
            'label'         => 'Show Right Sidebar',
            'type'          => 'yesno',
            'default_value' => 'no'
      		)*/
      		array(
              'name'          => 'rows',
              'label'         => 'How many rows?',
              'type'          => 'select',
              'options'       => array(
                  'count2'    => 'Two',
                  'count3'    => 'Three',
                  'count4'    => 'Four'
              ),
              'default_value' => 'Two'
            )
      ),
    'side'
);

$pages->add_meta_box(
    'homepage',
    'Website or Service Homepage Section',
    array (
      'tabs',
    		array(
      		'Homepage Settings'   => array(
            array(
              'name'          => 'shownews',
              'label'         => 'Show News?',
              'type'          => 'yesno',
              'default_value' => 'no'
            ),
            array(
              'name'          => 'postcount',
              'label'         => 'How Many News Entries?',
              'type'          => 'text'
            ),
            array(
              'name'          => 'deanmsg',
              'label'         => 'Message from Chair',
              'type'          => 'post_select',

              'args'          => array(
  				            'post_type' => 'page',
  				            'posts_per_page'	=> -1,
          		        'orderby'			=> 'parent title',
          		        'order'				=> 'ASC',
  				            'show_option_none' => 'None'
                      )
  				  ),
            array(
              'name'          => 'showcal',
              'label'         => 'Show Calendar?',
              'type'          => 'yesno',
              'default_value' => 'no'
            ),
            array(
              'name'          => 'calname',
              'label'         => 'Enter Calendar ID',
              'type'          => 'text'
            ),
            array(
              'name'          => 'calcount',
              'label'         => '# of Calendar Entries?',
              'type'          => 'text'
            ),
            array(
              'name'          => 'label',
              'label'         => 'Homepage Section Label',
              'description'   => '<span style="color:#d60000;">Optional</span>',
              'type'          => 'text'
            ),
            array(
              'name'          => 'count',
              'label'         => '3 or 4 Homepage Areas?',
              'type'          => 'select',
              'options'       => array(
                  'count3'    => 'Three',
                  'count4'    => 'Four'
              ),
              'default_value' => 'Three'
            ),
            array(
              'name'          => 'width',
              'label'         => 'Homepage Slider Width',
              'description'   => 'Invalid if video is present.',
              'type'          => 'select',
              'options'       => array(
                  'full'        => 'Oversized Full Width',
                  'regular'     => 'Regular Width'
              ),
              'default_value' => 'full'
            ),
            array(
                'name'          => 'layout',
                'label'         => 'Homepage Layout',
                'description'   => 'Choose your homepage layout preference.',
                'type'          => 'select',
                'options'       => array(
                    'hplo1'         => 'Default',
                    'hplo2'         => 'Stacked Cards',
                    'hplo3'         => 'Overlay On Top of Picture'
                ),
                'default_value' => 'hplo1'
            )
          ),

          'Homepage Areas'     => array(
            array(
              'name'          => 'image01',
              'label'         => '<h3>Image 1</h3>',
              'description'   => 'Please make sure all images are the same size (Image 1 / 2 / 3 / 4)',
              'type'          => 'image'
            ),
            array(
              'name'          => 'title01',
              'label'         => 'Special Title 1',
              'type'          => 'text'
            ),
            array(
              'name'          => 'textarea01',
              'label'         => '<span style="color:#d60000;font-weight:bold;">*optional</span> Description 1',
              'description'   => 'Must be in html!',
              'type'          => 'textarea'
            ),
            array(
              'name'          => 'link01',
              'label'         => '<br/><br/>Link 1',
              'description'   => 'You must include <strong>http://</strong> or <strong>https://</strong><br/><br/>',
              'type'          => 'text'
            ),
            array(
              'name'          => 'image02',
              'label'         => '<hr style="border-bottom:solid 2px #00246b; margin-bottom:10px;"<h3>Image 2</h3>',
              'description'   => 'Please make sure all images are the same size (Image 1 / 2 / 3 / 4)',
              'type'          => 'image'
            ),
            array(
              'name'          => 'title02',
              'label'         => 'Special Title 2',
              'type'          => 'text'
            ),
            array(
              'name'          => 'textarea02',
              'label'         => '<span style="color:#d60000;font-weight:bold;">*optional</span> Description 2',
              'description'   => 'Must be in html!',
              'type'          => 'textarea'
            ),
            array(
              'name'          => 'link02',
              'label'         => '<br/><br/>Link 2',
              'description'   => 'You must include <strong>http://</strong> or <strong>https://</strong><br/><br/>',
              'type'          => 'text'
            ),
            array(
              'name'          => 'image03',
              'label'         => '<hr style="border-bottom:solid 2px #00246b; margin-bottom:10px;"<h3>Image 3</h3>',
              'description'   => 'Please make sure all images are the same size (Image 1 / 2 / 3 / 4)',
              'type'          => 'image'
            ),
            array(
              'name'          => 'title03',
              'label'         => 'Special Title 3',
              'type'          => 'text'
            ),
            array(
              'name'          => 'textarea03',
              'label'         => '<span style="color:#d60000;font-weight:bold;">*optional</span> Description 3',
              'description'   => 'Must be in html!',
              'type'          => 'textarea'
            ),
            array(
              'name'          => 'link03',
              'label'         => '<br/><br/>Link 3',
              'description'   => 'You must include <strong>http://</strong> or <strong>https://</strong><br/><br/>',
              'type'          => 'text'
            ),
            array(
              'name'          => 'image04',
              'label'         => '<hr style="border-bottom:solid 2px #00246b; margin-bottom:10px;"<h3>Image 4</h3>',
              'description'   => 'Please make sure all images are the same size (Image 1 / 2 / 3 / 4)',
              'type'          => 'image'
            ),
            array(
              'name'          => 'title04',
              'label'         => 'Title 4',
              'type'          => 'text'
            ),
            array(
              'name'          => 'textarea04',
              'label'         => '<span style="color:#d60000;font-weight:bold;">*optional</span> Description 4',
              'description'   => 'Must be in html!',
              'type'          => 'textarea'
            ),
            array(
              'name'          => 'link04',
              'label'         => 'Link 4',
              'description'   => 'You must include <strong>http://</strong> or <strong>https://</strong>',
              'type'          => 'text'
            )
          ),

          // ADDED FOR CARMIG - MAYBE TAKE OUT??
      		'3rd Column Option'   => array(
            array(
              'name'          => 'col3_show',
              'label'         => 'Show 3rd Column?',
              'type'          => 'yesno',
              'default_value' => 'no'
            ),
            array(
              'name'          => 'col3_title',
              'label'         => 'Featured Column Title',
              'type'          => 'text'
            ),
            array(
              'name'          => 'col3_body',
              'label'         => 'Featured Column Body',
              'description'   => 'Shows directly under featured post + excerpt.',
              'type'          => 'wysiwyg'
            ),
            array(
              'name'          => 'col3_btn',
              'label'         => 'Button Text',
              'description'   => 'Button text to show under <em>Featured Column Body</em>.',
              'type'          => 'text'
            ),
            array(
              'name'          => 'col3_link',
              'label'         => 'Button Link',
              'description'   => 'You must include <strong>http://</strong>',
              'type'          => 'text'
            )
          ),
      		'Twitter'   => array(
            array(
              'name'          => 'twitter_username',
              'label'         => 'Twitter Username',
              'type'          => 'text'
            ),
            array(
              'name'          => 'twitter_count',
              'label'         => 'How many tweets?',
              'type'          => 'text'
            )
          ),
      		'Banner'   => array(
            array(
              'name'          => 'banner_image',
              'label'         => 'Background for Banner',
              'description'   => '<span style="color:#d60000;font-weight:bold;">*Optional</span>',
              'type'          => 'image'
            ),
            array(
              'name'          => 'banner_color',
              'label'         => 'Background color',
              'type'          => 'color'
            ),
            array(
              'name'          => 'banner_textcolor',
              'label'         => 'Text color',
              'type'          => 'color'
            ),
            array(
              'name'          => 'banner_body',
              'label'         => 'Banner Body',
              'type'          => 'wysiwyg'
            )
          ),
      		'ScheduleNow'   => array(
            array(
              'name'          => 'hp_schedulenow',
              'label'         => 'ScheduleNow Widget',
              'description'   => 'Paste ScheduleNow Widget. <br /><strong style="color:red;">WARNING: This will remove the <br />"3rd Column Option"</strong>.',
              'type'          => 'textarea'
            )
          )
        )
    )
);



/*---------------------------------------------------------------------------------------
  ----------------------------------- Slider Module -------------------------------------
  ----------------------------------------------------------------------------------------*/
$pages->add_meta_box(
    'video',
    'Video',
    array(
      array(
          'name'          => 'source',
          'label'         => 'Streaming from:',
          'type'          => 'select',
          'options'       => array(
              'vimeo'     => 'Vimeo',
              'youtube'   => 'Youtube',
              'other'     => 'Other'
              ),
          'default_value' => 'youtube'
      ),
      array(
          'name'          => 'embed',
          'label'         => 'Include Video?',
          'description'   => 'copy/paste the YouTube / Vimeo video ID. If other selected, copy/paste the embed link.',
          'type'          => 'text'
      )
    )
);


/*---------------------------------------------------------------------------------------
  ----------------------------------- Slider Module -------------------------------------
  ----------------------------------------------------------------------------------------*/
$pages->add_meta_box(
    'slider',
    'Image Slider',
    array(
            'bundle',
        array(
        	array(
        		'name'			=> 'slide',
        		'label'			=> 'Select an Image',
        		'description'	=> 'Please make sure that the image size is no less than XXpx x XXpx',
        		'type'			=> 'image'
        	),
          array(
              'name'          => 'caption',
              'label'         => 'Caption & Link',
              'description'   => 'Enter the Caption for the image and Link it to something if requi#d60000',
              'type'          => 'wysiwyg'
          )/*,
          array(
              'name'          => 'cta_text',
              'label'         => 'Button Text',
              'description'   => 'This produces a button that overlays over the image. Caption will be placed as subheader beneath.',
              'type'          => 'text'
          ),
          array(
              'name'          => 'cta_link',
              'label'         => 'Button Link',
              'description'   => 'This is the link where the button goes when clicked on.',
              'type'          => 'text'
          )*/
        )
    )
);

/*---------------------------------------------------------------------------------------
  ------------------------------- TILED LISTING Module ----------------------------------
  ----------------------------------------------------------------------------------------*/
$pages->add_meta_box(
    'tiledoptions',
    'Tiled Listing Options',
      array(
      	array(
      		'name'			=> 'colspan',
      		'label'			=> 'Column per Row Count',
          'type'          => 'select',
          'options'       => array(
              'col2'    => 'Two',
              'col3'    => 'Three',
              'col4'    => 'Four'
          ),
          'default_value' => 'Four'
      	),
      	array(
      		'name'			=> 'sidebar',
      		'label'			=> 'Do you want to include a sidebar?',
          'type'          => 'select',
          'options'       => array(
              'include'    => 'Include',
              'exclude'    => 'Exclude',
          ),
          'default_value' => 'include'
      	)//,
/*      	array(
        	'name'      => 'imglocation',
        	'label'     => 'Image Location',
        	'type'          => 'select',
        	'options'       => array(
          	  'left'      => 'Left',
          	  'right'     => 'Right',
          	  'full'      => 'Full'
        	),
        	'default_value' => 'Left'
      	)*/
      )
);


/*---------------------------------------------------------------------------------------
  ------------------------------- TILED LISTING Module ----------------------------------
  ----------------------------------------------------------------------------------------*/
$pages->add_meta_box(
    'staff',
    'Tiled Listing',
    array(
            'bundle',
        array(
        	array(
          		'name'			    => 'image',
          		'label'			    => 'Image of Tiled Listing',
              'description'   => 'For best performance, resize your image to <span style="color:#d60000;">400px (wide) by 300px (tall)</span>',
          		'type'			    => 'image'
        	),
        	array(
          		'name'			    => 'title',
          		'label'			    => 'Title of Tiled Listing',
              'description'   => '<span style="color:#d60000;">*optional</span>',
          		'type'			    => 'text'
        	),
          array(
              'name'          => 'link',
              'label'         => 'Link for Tiled Listing',
              'description'   => '<strong>will work only when title field is populated. Please include: http://</strong>',
              'type'          => 'text'
          ),
          array(
              'name'          => 'body',
              'label'         => 'Description of Tiled Listing',
              'type'          => 'wysiwyg'
          )
        )
    )
);


/*---------------------------------------------------------------------------------------
  ----------------------------------- Contact Module -------------------------------------
  ----------------------------------------------------------------------------------------*/
$pages->add_meta_box(
    'contact',
    'Contact Information',
      array(
      	array(
      		'name'			=> 'gmap',
      		'label'			=> 'Google Embed (copy/paste)',
      		'description'	=> 'Copy and paste the google maps iframe embed text. Please specify the exact dimensions: <strong>width: 600, height: 450</strong>.',
      		'type'			=> 'textarea'
      	)
      )
);

/*---------------------------------------------------------------------------------------
  --------------------------FACULTY LISTING MODULE VERSION 2-----------------------------
  ----------------------------------------------------------------------------------------*/
$pages->add_meta_box(
    'facultypagev2div',
    'Faculty Listing',
      array(
      	'bundle',
      		array(
	      		array(
	            'name'          => 'label',
	            'label'         => 'Faculty Label',
	            'description'   => 'Label for Faculty',
	            'type'          => 'text'
	      		),
	          array(
	            'name'          => 'faculty',
	            'label'         => 'Faculty',
	            'description'   => 'Select Faculty',
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
    )
);


$pages->add_meta_box(
    'sections',
    'Page Sections',
    array(
            'bundle',
        array(
            array(
                'name'          => 'layout',
                'label'         => 'Layout',
                'description'   => 'Select the layout.',
                'type'          => 'select',
                'options'       => array(
                    'layout3'    => 'Normal Page Section',
                    'layout2'    => 'Left Image / Right Text',
                    'layout9'    => 'Left Text / Right Image',
                    'layout1'    => 'Full Background Image with body text',
                    'layout4'    => 'Dark Gray Background',
                    'layout5'    => 'Dark Blue Background',
                    'layout6'    => 'McGovern Blue Background',
                    'layout7'    => 'Light Gray Background',
                    'layout8'    => 'Light Beige Background'//,
//                    'layout10'   => 'Double Box'

                ),
                'default_value' => 'Normal Page Section'
            ),
            array(
                'name'          => 'width',
                'label'         => 'Regular Width / Oversized Full-Width',
                'description'   => 'Preset to regular width',
                'type'          => 'select',
                'options'       => array(
                    'regular'   => 'Regular Width',
                    'full'      => 'Oversized Full-Width'
                ),
                'default_value' => 'Oversized Full-Width'
            ),
            array(
                'name'          => 'title',
                'label'         => 'Section Title',
                'description'   => 'Unless you have "Normal Page Section / Tabbed Page(s)" selected as a layout, this title will not show. This is the section label for this area.',
                'type'          => 'text'
            ),
            array(
                'name'          => 'bgimage',
                'label'         => 'Background Image',
                'description'   => '1200px x 600px 72dpi. Fullsize background.',
                'type'          => 'image'
            ),
            array(
                'name'          => 'content',
                'label'         => 'Content',
                'type'          => 'wysiwyg'
            )
        )
    )
);


$pages->add_meta_box(
    'tabs',
    'Tabbed Sections',
    array(
            'bundle',
        array(
            array(
                'name'          => '_layout',
                'label'         => 'Layout',
                'description'   => 'Select the layout.',
                'type'          => 'select',
                'options'       => array(
                    'layout1'    => 'Parent',
                    'layout2'    => 'Child',
                    'layout3'   => 'Child of Child'
                ),
                'default_value' => 'Parent'
            ),
            array(
                'name'          => '_title',
                'label'         => 'Section Title',
                'type'          => 'text'
            ),
            array(
                'name'          => '_content',
                'label'         => 'Content',
                'type'          => 'wysiwyg'
            )
        )
    )
);


$pages->add_meta_box(
    'additional',
    'Internal Pages',
    array(
         array(
            'name'          => 'page',
            'label'         => 'Related Page',
            'description'   => 'Select Related page. <span style="color:#d60000;">Will appear in the left sidebar</span>',
            'type'          => 'post_select',
            'args'          => array(
				            'post_type' => 'page',
				            'posts_per_page'	=> -1,
                    'orderby'	=> 'title',
                    'order'       => 'ASC',
				            'show_option_none' => 'None'
				        ),
			'repeatable'	=> true
         )
    ),
    'side'
);

$pages->add_meta_box(
    'non_internal',
    'External Pages',
    array(
            'bundle',
        array(
            array(
                'name'          => 'title',
                'label'         => 'Label',
                'type'          => 'text'
            ),
            array(
                'name'          => 'url',
                'label'         => 'URL',
                'description'   => 'Enter the full URL. <span style="color:#d60000;">Include http:// or https://</span>',
                'type'          => 'text'
            )
        )
    ),
    'side'
);

$pages->add_meta_box(
    'pg_settings',
    'Right Sidebar',
      array(
          array(
              'name'          => 'r_label',
              'label'         => 'Right Sidebar Label',
              'type'          => 'text'
          ),
          array(
              'name'          => 'r_content',
              'label'         => 'Right Sidebar Content',
              'type'          => 'wysiwyg'
          )
      ),
      'side'
);



/*---------------------------------------------------------------------------------------
  ----------------------------------- Service Page --------------------------------------
  -------------- allows a service or clinic to have its own title and menu --------------
  ----------------------------------------------------------------------------------------*/

$pages->add_meta_box (
	'service_menu',
	'Is This a Service <em>and</em> Choose a Menu',
		array(
			array(
				'name'		=> 'service_exists',
				'label'		=> 'Is this a Service or part of a Service?',
				'type'		=> 'select',
				'options'	=>	array (
										'no'	=>	'No',
										'yes'	=>	'Yes'
								),
				'default_value' => 'No'
			),
			array(
				'name'		=> 'service_menu_selection',
				'label'		=> 'Please select the appropriate menu for this service.',
				'type'		=> 'select',
				'options'	=>	array (
										''			=>	'None',
										'menu-4'	=>	'menu-4',
										'menu-5'	=>	'menu-5',
										'menu-6'	=>	'menu-6',
										'menu-7'	=>	'menu-7',
										'menu-8'	=>	'menu-8',
										'menu-9'	=>	'menu-9',
										'menu-10'	=>	'menu-10',
										'menu-11'	=>	'menu-11',
										'menu-12'	=>	'menu-12',
										'menu-13'	=>	'menu-13'
								),
				'default_value' => 'None'
			)
	)
);



/*---------------------------------------------------------------------------------------
  ----------------------------------- Livesort Page -------------------------------------
  ---------- allows for a page template for posts with live sort functionality ----------
  ----------------------------------------------------------------------------------------*/

$pages->add_meta_box(
	'livesort',
	'Live Sort Page options',
	array(
		array(
			'name'          =>	'postslug',
			'label'         =>	'<span style="font-size:14px;">Enter the category slug</span>',
			'description'	=>	'<span style="font-size:13px;">Example: <span style="color:#c00000;">some-post-category</span></span>',
			'type'          =>	'text'
		),
		array(
			'name'          =>	'postslugshort',
			'label'         =>	'<span style="font-size:14px;">Enter the category slug without hyphens and spaces</span>',
			'description'	=>	'<span style="font-size:13px;">Example: <span style="color:#c00000;">somepostcategory</span></span>',
			'type'          =>	'text'
		)
	)
);