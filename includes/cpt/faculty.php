<?php

/* ========================================= */
/* CPT for Faculty                           */
/* ========================================= */

$faculty = new Cuztom_Post_Type( 'Faculty', array(
        'has_archive' => true,
        'supports' => array ('title', 'revisions', 'thumbnail', 'editor', 'author'),
        'rewrite' => array (
                            'slug' => 'faculty',
                            'with_front' => false
							),
        'menu_icon' => 'dashicons-id',
        'labels' => array(
              'name'      => 'Faculty Profiles',
              'menu_name' => 'Faculty Profiles',
              'all_items' => 'All Faculty Profiles'
         )
    )
);

$faculty->add_taxonomy( 'Division', array(
							'labels' => array(
								'name' => 'Divisions',
                'show_admin_column' => true
							)
						));

$faculty->add_taxonomy( 'Faculty Type', array(
							'labels' => array(
								'name' => 'Faculty Types',
                'show_admin_column' => true,
							)
						));


$faculty->add_meta_box(
    'info',
    'General Information',
    array(
        array(
            'name'          => 'fname',
            'label'         => 'First Name',
            'type'          => 'text'
         ),
        array(
            'name'          => 'mname',
            'label'         => 'Middle Name',
            'description'   => 'Enter your middle name or initial',
            'type'          => 'text'
         ),
        array(
            'name'          => 'lname',
            'label'         => 'Last Name',
            'type'          => 'text'
        ),
        array(
            'name'          => 'faculty_degrees',
            'label'         => 'Degrees',
            'description'   => 'e.g., "M.D., Ph.D., FACS," which will be automatically added after your name.',
            'type'          => 'text'
         ),
        array(
            'name'          => 'email',
            'label'         => 'Email',
            'type'          => 'text'
        ),
        array(
            'name'          => 'phone',
            'label'         => 'Phone 1',
            'type'          => 'text'
        ),
        array(
            'name'          => 'cphone',
            'label'         => 'Phone 2',
            'type'          => 'text'
        ),
        array(
            'name'          => 'phone3',
            'label'         => 'Phone 3',
            'type'          => 'text'
        ),
        array(
            'name'          => 'fax',
            'label'         => 'Fax',
            'type'          => 'text'
        ),
        array(
            'name'          => 'utp',
            'label'         => 'UT Physicians URL',
            'description'   => 'Eg: http://www.utphysicians.com/5950/james-red-duke/',
            'type'          => 'text'
        ),
        array(
            'name'          => 'appointment',
            'label'         => 'Schedule Appointment link',
            'description'   => 'If provider is outside of UTP, place schedule link here.',
            'type'          => 'text'
        ),
        array(
            'name'          => 'schedulenow',
            'label'         => 'Schedule Now Area',
            'description'   => 'This will only work for schedule now widgets.',
            'type'          => 'textarea'
        ),
        array(
            'name'          => 'pubmed',
            'label'         => 'Pubmed URL',
            'type'          => 'text'
        ),
        array(
            'name'          => 'cv',
            'label'         => 'CV',
            'description'   => 'Upload your CV here (PDF)',
            'type'          => 'file'
        )
    )
);

$faculty->add_meta_box(
    'title',
    'Faculty Title',
    array(
            'bundle',
      array(
        array(
            'name'          => 'title',
            'label'         => 'Title held',
            'type'          => 'text'
         ),
        array(
            'name'          => 'name',
            'label'         => 'Name of Organization',
            'description'   => 'Department, Division, Center, etc.',
            'type'          => 'text'
         )
      )
    )
);


$faculty->add_meta_box(
    'assistant',
    'Administrative/Staff/Nurse Contact Information',
    array(
        array(
            'name'          => 'label',
            'label'         => 'Label',
            'description'   => 'Optional. <strong style="color:#d60000;">Default label: Administrative Contact</strong>',
            'type'          => 'text'
        ),
        array(
            'name'          => 'fullname',
            'label'         => 'Full Name',
            'type'          => 'text'
         ),
        array(
            'name'          => 'email',
            'label'         => 'Email',
            'type'          => 'text'
        ),
        array(
            'name'          => 'phone',
            'label'         => 'Phone',
            'type'          => 'text'
        ),
        array(
            'name'          => 'content',
            'label'         => 'Body',
            'description'   => 'Optional. Include only if additional information is required. <br /><strong style="color:#d60000;"><em>Warning: Must use advanced <a href="https://www.w3schools.com/html/html_basic.asp" target="blank" title="." style="text-decoration-style:dotted;color:#d6a700;">HTML markup</a>.</em></strong>',
            'type'          => 'textarea'
        )
    )
);


$faculty->add_meta_box(
    'education',
    'Education Information',
    array(
            'bundle',
      array(
      	array(
            'name'          => 'degree',
            'label'         => 'Name of Degree or Program',
            'description'   => 'Eg: Post Graduate School, Graduate School, Post Graduate Training etc',
            'type'          => 'text'
         ),
        array(
            'name'          => 'detail',
            'label'         => 'Name of University/Hospital',
            'description'	=> 'Eg: Microbiology & Immunology, University of California Los Angeles, 1980',
            'type'          => 'text'
         )
      )
    )
);

$faculty->add_meta_box(
    'interests',
    'Areas of Interests',
    array(
        array(
            'name'          => 'clinical',
            'label'         => 'Clinical Interests',
            'type'          => 'wysiwyg'
         ),
         array(
            'name'          => 'research',
            'label'         => 'Research Interests',
            'type'          => 'wysiwyg'
         )
    )
);

$faculty->add_meta_box(
    'contactinfo',
    'Contact Information',
    array(
        array(
            'name'          => 'content',
            'label'         => 'Enter Contact Information',
            'type'          => 'wysiwyg'
         )
    )
);

$faculty->add_meta_box(
    'research',
    'Research Information',
    array(
        array(
            'name'          => 'info',
            'label'         => 'Enter Research Information',
            'type'          => 'wysiwyg'
         )
    )
);

$faculty->add_meta_box(
    'publication',
    'Publication Information',
    array(
        array(
            'name'          => 'info',
            'label'         => 'Enter Publications as List',
            'type'          => 'wysiwyg'
         )
    )
);

$faculty->add_meta_box(
    'additional',
    'Additional Information',
    array(
        array(
            'name'          => 'title',
            'label'         => 'Title of Section',
            'description'   => '*optional. This will only appear if you fill it out.',
            'type'          => 'text'
         ),
        array(
            'name'          => 'info',
            'label'         => 'Enter any additional Information',
            'type'          => 'wysiwyg'
         )
    )
);

$faculty->add_meta_box(
    'external',
    'External Links',
    array(
            'bundle',
      array(
        array(
            'name'          => 'urltitle',
            'label'         => 'Label for the Link',
            'type'          => 'text'
         ),
        array(
            'name'          => 'url',
            'label'         => 'The URL',
            'description'   => 'Please include the http:// or https://',
            'type'          => 'text'
         )
      )
    ),
    'side'
);

$faculty->add_meta_box(
    'related',
    'Related Pages',
        array(
            array(
                'name'          => 'page',
                'label'         => 'Related Page',
                'type'          => 'post_select',
                'args'          => array(
    				            'post_type' => 'page',
    				            'posts_per_page'	=> -1,
    				            'show_option_none' => 'None'
                        ),
                'repeatable'	=> true
            )
    ),
    'side'
);

$faculty->add_meta_box(
    'specialties',
    'Specialties',
    array(
        array(
            'name'          => 'items',
            'label'         => 'Name of specialty',
            'type'          => 'text',
            'repeatable'    => true
        )
    ),
    'side'
);

$faculty->add_meta_box(
    'spotlight_pg',
    'Spotlight Page',
    array(
        array(
            'name'          => 'label',
            'label'         => 'Label for this area',
            'type'          => 'text'
         ),
            array(
                'name'          => 'page',
                'label'         => 'Select Related Spotlight Page(s)',
                'type'          => 'post_select',
                'args'          => array(
    				            'post_type' => 'page',
    				            'posts_per_page'	=> -1,
    				            'show_option_none' => 'None'
                        ),
                'repeatable'	=> true
            )
    )
);