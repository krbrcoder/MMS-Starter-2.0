<?php
function set_faculty_title ($post_id) {
    if ( $post_id == null || empty($_POST) )
        return;

    if ( !isset( $_POST['post_type'] ) || $_POST['post_type']!='faculty' )
        return;

    if ( wp_is_post_revision( $post_id ) )
        $post_id = wp_is_post_revision( $post_id );

    global $post;
    if ( empty( $post ) )
        $post = get_post($post_id);

    if ($_POST['cuztom']['_info_fname']!='') {

        global $wpdb;

		$fname = trim($_POST['cuztom']['_info_fname']) . ' '; // Adding a space at the end

		$middlename  = trim($_POST['cuztom']['_info_mname']);

		if (!empty($middlename)){ // Put this to avoid the dot when there is no middle name
			$mname =  substr($middlename, 0, 1) . '. '; //adding a period and space after mname after shortening it to 1 character
		} else {
			$mname = $middlename;
		}

		$lname   = trim($_POST['cuztom']['_info_lname']);

        $degrees   = trim($_POST['cuztom']['_info_faculty_degrees']);
        $degrees   = str_replace('.','',$degrees);

        $title = $fname . $mname . $lname. ', '. $degrees;
        $slug = sanitize_title($title);
        $where = array( 'ID' => $post_id );
        $wpdb->update( $wpdb->posts, array(
        							'post_title' => $title,
        							'post_name' => $slug
        							), $where );

    }
}
add_action('save_post', 'set_faculty_title', 12 );


function set_faculty_thumb ($post_id) {

    if ( !isset( $_POST['post_type'] ) || $_POST['post_type']!='faculty' )
    return;

    if ( wp_is_post_revision( $post_id ) )
        $post_id = wp_is_post_revision( $post_id );

    global $post;
    if ( empty( $post ) )
    $post = get_post($post_id);

    $already_has_thumb = has_post_thumbnail($post_id);

    if (!$already_has_thumb) {
  		$thumbname = trim($_POST['cuztom']['_info_fname']).'-'.trim($_POST['cuztom']['_info_lname']).'-web';

      $facultythumbargs = array(
          'post_type' => 'attachment',
          'post_mime_type' =>'image',
          'name' => trim($thumbname),
          'posts_per_page' => -1,
      );
      $images = new WP_Query( $facultythumbargs );
        if ($images) {
            foreach ($images as $attachment_id => $attachment) {
              set_post_thumbnail( $post_id, $attachment_id );
            }
        }
    }
}
add_action('save_post', 'set_faculty_thumb' );