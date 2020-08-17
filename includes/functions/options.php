<?php
  add_action('admin_menu', 'mythemeoptions');
  add_action( 'admin_enqueue_scripts', 'theme_admin_css' );

  function theme_admin_css(){

    $stylesheeturi = get_stylesheet_directory_uri();
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $stylesheeturi; ?>/includes/functions/options-style.css">

  <?php
  $home = get_bloginfo('url');
  wp_register_style( 'custom_wp_admin_css', $stylesheeturi . '/includes/functions/options-style.css', false, '1.0.0' );
          wp_enqueue_style( 'custom_wp_admin_css' );
  }

  function mythemeoptions ()
  {
  if ( count($_POST) > 0 && isset($_POST['theme_settings']) )
  	{

  	$options = array ( 'site_logo' , 'site_dept' , 'site_name' , 'site_color' ,
  	'inject_header' , 'inject_footer' ,
  	'menu_button_label' , 'menu_button_link' ,
    'facebook' , 'twitter' , 'googleplus' , 'youtube' , 'instagram' , 'pinterest' , 'linkedin' ,
  	'address_area',
  	'specialties_label'

  	);
  		foreach ( $options as $opt )
  		{
  			delete_option ( 'theme_'.$opt, $_POST[$opt] );
  			add_option ( 'theme_'.$opt, $_POST[$opt] );
  		}
  	}

  	add_theme_page(__('Theme Options'), __('Theme Options'), 'delete_pages', basename(__FILE__), 'theme_settings');
  }

function theme_settings()
{?>
<div class="wrap">

  <script type="text/javascript">

  jQuery(document).ready(function() {
      jQuery('.vertical-tab-links a').on('click', function(e)  {


          var currentAttrValue = jQuery(this).attr('id');


   		//console.log(currentAttrValue);

   		var idd=currentAttrValue.split('-');

   		var tabid=idd[2];


          jQuery('.vertical-right-tab').hide();

          jQuery('#vertical-right-tab'+tabid).show();

          e.preventDefault();
      });
  });

  jQuery(document).ready(function() {
      jQuery('.horizontal-tab-links a').on('click', function(e)  {
          var currentAttrValue = jQuery(this).attr('href');

          // Show/Hide Tabs
          jQuery('.horizontal-down-tab' + currentAttrValue).show().siblings().hide();

          // Change/remove current tab to active
          jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

          e.preventDefault();
      });
  });


  </script>

	<h2>Theme Options</h2>
  <style>
    #search-panel, .howto { display:none!important; }
    #link-options .howto { display: block !important; }
  </style>

  <!-- THEME TAB CONTAINER -->
	<div class="theme-tab-container">

    <!-- VERTICAL TAB CONTENT (RIGHT COLUMN MENU) -->
		<div class="vertical-tab-content">
  		<form method="post" action="">

  		<!-- VERTICAL RIGHT TAB 1 -- PAGE SETTINGS -->
			<div id="vertical-right-tab1" class="vertical-right-tab active">

        <!-- HORIZONTAL UP TAB LABELS -->
				<div class="horizontal-up-tab">

					<ul class="horizontal-tab-links">
						<li><a href="#v1-horizontal-down-tab1" class="horizontal-tab-links">Logo</a></li>
						<li><a href="#v1-horizontal-down-tab2" class="horizontal-tab-links">Header</a></li>
						<li><a href="#v1-horizontal-down-tab3" class="horizontal-tab-links">Social</a></li>
						<li><a href="#v1-horizontal-down-tab4" class="horizontal-tab-links">Footer</a></li>
						<li><a href="#v1-horizontal-down-tab5" class="horizontal-tab-links">Code Injections</a></li>
						<li><a href="#v1-horizontal-down-tab6" class="horizontal-tab-links">Faculty</a></li>
					</ul>

				</div>
				<!-- END HORIZONTAL UP TAB LABELS -->

				<!-- HORIZONTAL TAB CONTENT -->
				<div class="horizontal-tab-content">

          <!-- FIRST TAB -->
					<div id="v1-horizontal-down-tab1" class="horizontal-down-tab active">
  				  <!-- START FIELDSET -->
						<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
  						<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Logo</strong></legend>
              <table class="form-table">

                <!-- TEXT LINE -->
								<tr valign="top">
  								<th scope="row"><label for="site_dept">Center / Office / Department specification</label></th>
  								<td>
  									<input type="text" name="site_dept" value="<?php echo get_option('theme_site_dept'); ?>" placeholder="Office of">
  								</td>
								</tr>

                <!-- TEXT LINE -->
								<tr valign="top">
  								<th scope="row"><label for="site_name">Name</label></th>
  								<td>
  									<input type="text" name="site_name" value="<?php echo get_option('theme_site_name'); ?>" placeholder="Communication">
  								</td>
								</tr>

                <!-- TEXT LINE -->
								<tr valign="top">
  								<th scope="row"><label for="site_logo">Link for site logo</label></th>
  								<td>
  									<input type="text" name="site_logo" value="<?php echo get_option('theme_site_logo'); ?>">
  								</td>
								</tr>

                <!-- TEXT LINE -->
								<tr valign="top">
  								<th scope="row"><label for="site_color">Specify Site Color</label></th>
  								<td>
  									<input type="text" name="site_color" value="<?php echo get_option('theme_site_color'); ?>">
  								</td>
								</tr>

								<?php /*
                <!-- TEXT LINE -->
								<tr valign="top">
  								<th scope="row"><label for="site_favicon">Link for logo favicon</label></th>
  								<td>
  									<input type="text" name="site_favicon" value="<?php echo get_option('theme_site_favicon'); ?>">
  								</td>
								</tr> */ ?>

              </table>
						</fieldset>
						<!-- END FIELDSET -->

						<!-- SUBMIT BUTTON AREA -->
						<p class="submit">
						  <input type="submit" name="Submit" class="button-primary" value="Save Changes" />
							<input type="hidden" name="theme_settings" value="save" style="display:none;" />
						</p>

					</div>
					<!-- END FIRST TAB -->

          <!-- SECOND TAB -->
					<div id="v1-horizontal-down-tab2" class="horizontal-down-tab">
						<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
							<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Header</strong></legend>
							<table class="form-table">

								<!-- MENU BUTTON LABEL -->
								<tr valign="top">
  								<th scope="row"><label for="menu_button_label">Menu Button Label</label></th>
  								<td>
    								<input type="text" name="menu_button_label" value="<?php echo get_option('theme_menu_button_label')?>"  placeholder="Submit Donation">
  								</td>
								</tr>

								<!-- MENU BUTTON LINK -->
								<tr valign="top">
  								<th scope="row"><label for="menu_button_link">Menu Button Link</label></th>
  								<td>
    								<input type="text" name="menu_button_link" value="<?php echo get_option('theme_menu_button_link')?>" placeholder="http...">
  								</td>
								</tr>

							</table>
						</fieldset>

						<!-- SUBMIT BUTTON AREA -->
						<p class="submit">
						  <input type="submit" name="Submit" class="button-primary" value="Save Changes" />
							<input type="hidden" name="theme_settings" value="save" style="display:none;" />
						</p>

					</div>
          <!-- END SECOND TAB -->

          <!-- THIRD TAB -->
					<div id="v1-horizontal-down-tab3" class="horizontal-down-tab">
						<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
							<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Social</strong></legend>
							<table class="form-table">

								<!-- FACEBOOK -->
								<tr valign="top">
  								<th scope="row"><label for="facebook">Facebook Link</label></th>
  								<td>
    								<input type="text" name="facebook" value="<?php echo get_option('theme_facebook')?>" >
  								</td>
								</tr>

								<!-- TWITTER -->
								<tr valign="top">
  								<th scope="row"><label for="twitter">Twitter Link</label></th>
  								<td>
    								<input type="text" name="twitter" value="<?php echo get_option('theme_twitter')?>">
  								</td>
								</tr>

								<!-- GOOGLE -->
								<tr valign="top">
  								<th scope="row"><label for="googleplus">Google Plus Link</label></th>
  								<td>
    								<input type="text" name="googleplus" value="<?php echo get_option('theme_googleplus')?>">
  								</td>
								</tr>

								<!-- YOUTUBE -->
								<tr valign="top">
  								<th scope="row"><label for="youtube">YouTube Link</label></th>
  								<td>
    								<input type="text" name="youtube" value="<?php echo get_option('theme_youtube')?>">
  								</td>
								</tr>

								<!-- INSTAGRAM -->
								<tr valign="top">
  								<th scope="row"><label for="instagram">Instagram Link</label></th>
  								<td>
    								<input type="text" name="instagram" value="<?php echo get_option('theme_instagram')?>">
  								</td>
								</tr>

								<!-- PINTEREST -->
								<tr valign="top">
  								<th scope="row"><label for="pinterest">Pinterest Link</label></th>
  								<td>
    								<input type="text" name="pinterest" value="<?php echo get_option('theme_pinterest')?>">
  								</td>
								</tr>

								<!-- LINKEDIN -->
								<tr valign="top">
  								<th scope="row"><label for="pinterest">LinkedIn Link</label></th>
  								<td>
    								<input type="text" name="linkedin" value="<?php echo get_option('theme_linkedin')?>">
  								</td>
								</tr>

							</table>
						</fieldset>

						<!-- SUBMIT BUTTON AREA -->
						<p class="submit">
						  <input type="submit" name="Submit" class="button-primary" value="Save Changes" />
							<input type="hidden" name="theme_settings" value="save" style="display:none;" />
						</p>

					</div>
          <!-- END THIRD TAB -->

          <!-- FOURTH TAB -->
					<div id="v1-horizontal-down-tab4" class="horizontal-down-tab">
						<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
							<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Footer</strong></legend>
							<table class="form-table">

								<!-- TEXTAREA -->
								<tr valign="top">
								  <th scope="row">
  								  <label for="address_area">
  								    Address Area
  								  </label>
  								</th>
                  <td>
  								<?php

    								$eee = get_option('theme_address_area');
    								$content = stripslashes($eee);
    								$editor_id = "address_area";

    								wp_editor( $content, $editor_id, $settings = array('textarea_name'=> 'address_area', 'editor_class'=>'', 'editor_height'=>200) ); ?>

  								</td>
								</tr>

							</table>
						</fieldset>

						<!-- SUBMIT BUTTON AREA -->
						<p class="submit">
						  <input type="submit" name="Submit" class="button-primary" value="Save Changes" />
							<input type="hidden" name="theme_settings" value="save" style="display:none;" />
						</p>

					</div>
          <!-- END FOURTH TAB -->

          <!-- FIFTH TAB -->
					<div id="v1-horizontal-down-tab5" class="horizontal-down-tab">
						<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
							<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Code Injections</strong></legend>
							<table class="form-table">

								<!-- HEADER TEXTAREA -->
								<tr valign="top">
								  <th scope="row">
  								  <label for="inject_header">
  								    Header
  								  </label>
  								</th>
                  <td>
    								<textarea name="inject_header" style="width:100%;"><?php echo stripslashes_deep(get_option('theme_inject_header'))?></textarea>
  								</td>
								</tr>

								<!-- FOOTER TEXTAREA -->
								<tr valign="top">
								  <th scope="row">
  								  <label for="inject_footer">
  								    Footer Area
  								  </label>
  								</th>
                  <td>
    								<textarea name="inject_footer" style="width:100%;"><?php echo stripslashes_deep(get_option('theme_inject_footer'))?></textarea>
  								</td>
								</tr>

							</table>
						</fieldset>

						<!-- SUBMIT BUTTON AREA -->
						<p class="submit">
						  <input type="submit" name="Submit" class="button-primary" value="Save Changes" />
							<input type="hidden" name="theme_settings" value="save" style="display:none;" />
						</p>

					</div>
          <!-- END FIFTH TAB -->


          <!-- SIXTH TAB -->
					<div id="v1-horizontal-down-tab6" class="horizontal-down-tab">
						<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
							<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Faculty</strong></legend>
							<table class="form-table">

								<!-- FACULTY SPECIALTIES ROOT PAGE LABEL -->
								<tr valign="top">
  								<th scope="row"><label for="specialties_label">Specialties Link</label></th>
								</tr>
								<tr>
  								<td>This information will appear on the specialties portion of each faculty page as the root link if each specialty is tied in with a categorized parent page set. For example, if you would like all specialties to be loaded with the root <code>https://med.uth.edu/test/specialties/[specialty]/</code>, paste <code style="color:red;">https://med.uth.edu/test/specialties/</code> in the text box.</td>
								</tr>
  								<td>
    								<input type="text" name="specialties_label" value="<?php echo get_option('theme_specialties_label')?>"  placeholder="paste link here">
  								</td>
								</tr>

							</table>
						</fieldset>

						<!-- SUBMIT BUTTON AREA -->
						<p class="submit">
						  <input type="submit" name="Submit" class="button-primary" value="Save Changes" />
							<input type="hidden" name="theme_settings" value="save" style="display:none;" />
						</p>

					</div>
          <!-- END SIXTH TAB -->


				</div>
				<!-- END HORIZONTAL TAB CONTENT -->

			</div>
			<!-- END VERTICAL RIGHT TAB 1 -->

  		</form>
  	</div>
  	<!-- END VERTICAL TAB (RIGHT COLUMN MENU) -->

  </div>
  <!-- END THEME TAB CONTAINER -->

</div>

<?php } ?>
