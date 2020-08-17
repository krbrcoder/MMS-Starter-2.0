<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
		$cf = get_post_custom();
		//echo '<pre>'; print_r($cf); echo '</pre>';

		$profileID = $post->ID;

		$template_uri = get_template_directory_uri();

    if (isset($cf['_info_fname'][0])) {
  		$fname = $cf['_info_fname'][0];
		}
    if (isset($cf['_info_lname'][0])) {
  		$lname = $cf['_info_lname'][0];
    }
    if (!empty($cf['_info_mname'][0])) {
  		$middleName = $cf['_info_mname'][0];
      $mname =  substr($middleName, 0, 1) . '. '; //adding a period and space after mname after shortening it to 1 character
    }

    if ( (!empty($fname)) && (!empty($lname)) ) {
      if (!empty($mname)) {
  			$theName = $fname . ' ' . $mname . ' ' . $lname;
      } else {
  			$theName = $fname . ' ' . $lname;
  		}
		} else {
  		$theName = get_the_title();
		}

    if (isset($cf['_info_faculty_degrees'][0])) {
  		$degrees = $cf['_info_faculty_degrees'][0];
    }
    if (isset($cf['_info_email'][0])) {
  		$email = antispambot($cf['_info_email'][0]);
    }
		if (isset($cf['_info_phone'][0])) {
  		$phone1 = $cf['_info_phone'][0];
		}
		if (isset($cf['_info_cphone'][0])) {
  		$phone2 = $cf['_info_cphone'][0];
		}
		if (isset($cf['_info_phone3'][0])) {
  		$phone3 = $cf['_info_phone3'][0];
		}
    if (isset($cf['_info_fax'][0])) {
  		$fax = $cf['_info_fax'][0];
		}
    if (isset($cf['_info_utp'][0])) {
  		$utpURL = $cf['_info_utp'][0];
		}
    if (isset($cf['_info_appointment'][0])) {
  		$appointmentURL = $cf['_info_appointment'][0];
		}

    if (isset($cf['_info_schedulenow'][0])) {
  		$schedulenow = $cf['_info_schedulenow'][0];
		}

    if (isset($cf['_info_pubmed'][0])) {
  		$pubmedURL = $cf['_info_pubmed'][0];
		}
    if (isset($cf['_info_cv'][0])) {
  		$cv = $cf['_info_cv'][0];
		}

    if (isset($cf['_assistant_label'][0])) {
  		$alabel = $cf['_assistant_label'][0];
		} else {
  		$alabel = 'Administrative Contact';
		}
    if (isset($cf['_assistant_fullname'][0])) {
  		$afullname = $cf['_assistant_fullname'][0];
		}
    if (isset($cf['_assistant_email'][0])) {
  		$aemail = antispambot($cf['_assistant_email'][0]);
    }
    if (isset($cf['_assistant_phone'][0])) {
  		$aphone = $cf['_assistant_phone'][0];
    }
    if (isset($cf['_assistant_content'][0])) {
  		$acontent = $cf['_assistant_content'][0];
		}

    if (!empty($cf['_title'][0])) {
  		$title = unserialize($cf['_title'][0]);
  		$firsttitle = $title[0]['_title'];
		} else {
		}
  		$taxonomies = get_the_taxonomies($profileID, 'faculty_type');

    if (isset($cf['_education'][0])) {
  		$education = unserialize($cf['_education'][0]);
  		if (isset($education[0]['_degree'])) {
    		$educationtop = $education[0]['_degree'];
      }
		}
		if (isset($cf['_specialties_items'][0])) {
  		$specialties = unserialize($cf['_specialties_items'][0]);
  		$firstspecialty = $specialties[0];
		}

    $specialties_link_get = get_option( 'theme_specialties_label' );
    if (!empty($specialties_link_get)) {
    	$specialties_link_get = get_option( 'theme_specialties_label' );
  		$specialties_link_str_replace = str_replace('&', 'and', $specialties_link_get);
  		$specialties_link_str_replace = str_replace(array(' ' , ','), '-', $specialties_link_get);
  		$specialties_link = strtolower($specialties_link_str_replace);
//  		$specialties_link = sanitize_title_with_dashes($specialties_link_str_replace);
    }

		if (isset($cf['_contactinfo_content'][0])) {
  		$contactinfo = apply_filters( 'the_content', $cf['_contactinfo_content'][0]);
		}

		if (isset($cf['_interests_clinical'][0])) {
  		$clinical_interests = apply_filters( 'the_content', $cf['_interests_clinical'][0]) ;
		}
		if (isset($cf['_interests_research'][0])) {
  		$research_interests = apply_filters( 'the_content', $cf['_interests_research'][0]);
		}
		if (isset($cf['_publication_info'][0])) {
  		$publicationinfo = apply_filters( 'the_content', $cf['_publication_info'][0]);
    }
		if (isset($cf['_research_info'][0])) {
  		$researchinfo = apply_filters( 'the_content', $cf['_research_info'][0]);
		}
		if ( !empty($cf['_additional_title'][0]) ) {
  		$additionaltitle = $cf['_additional_title'][0];
  		$additionaltitleurl = sanitize_title_with_dashes($additionaltitle);
	    } else {
	      $additionaltitle = 'Additional Information';
	      $additionaltitleurl = 'additional';
	    }
    if (isset($cf['_additional_info'][0])) {
  		$additionalinfo = apply_filters( 'the_content', $cf['_additional_info'][0]);
		}

		if (isset($cf['_related_page'][0])) {
  		$relatedpages = unserialize($cf['_related_page'][0]);
    }

		if (!empty($cf['_external'][0])) {
  		$external = unserialize($cf['_external'][0]);
			$firstexternallink = $external[0]['_urltitle'];
    }

    if ( $post->post_content !="" ) {
  		$bio = apply_filters( 'the_content', $post->post_content);
		}
	 ?>

    <div id="main" class="container single-profile" role="banner" aria-label="main">
  		<div class="container single-profile-details light-blue-background">
  			<div class="col-md-3">
    	    <?php if ( has_post_thumbnail() ) {
    	      the_post_thumbnail('faculty-profile');
      	    } else {
      		  echo '<img class="img-fluid profile-pic" src="' . $template_uri . '/library/includes/2.0.1/images/faculty-full.jpg" alt="No Image available" />';
    		  }	?>
  			</div><!-- END .col-md-3 -->
  			<div class="col-md-9">

  				<div class="row">
  					<div class="col-md-12">
  						<h2><?php if (!empty($theName)) { echo $theName; } ?><?php if (!empty($degrees)){ ?><?php echo ', '. $degrees; ?><?php } ?></h2>
  					</div><!-- END .col-md-12 -->
  				</div><!-- END .row -->

  				<div class="row" id="bio-card">
    				<?php if(!empty($firstspecialty)) { ?>
    					<div class="col-md-4">
      					<?php if  (!empty($firsttitle)) { ?>
      						<ul>
      							<?php foreach($title as $titleitem) { ?>
      								<li><?php echo $titleitem['_title']; ?><?php if (!empty($titleitem['_name'])){ echo ', ' . $titleitem['_name']; }?></li>
      							<?php } // END FOREACH ?>
    		    			</ul>
  		    			<?php } // END IF TITLE / FACULTY TAXONOMY NOT SET ?>
    					</div>
    					<div class="col-md-4">
  		    			  <ul>
    		    			<?php foreach ($specialties as $specialty) { ?>
    		    			<?php if (!empty($specialties_link)) { ?>
      		    			<li><a href="<?php echo $specialties_link; ?>/<?php echo sanitize_title_with_dashes($specialty); ?>"><?php echo $specialty; ?></a></li>
    		    			<?php } else { ?>
      		    	    <li><?php echo $specialty; ?></li>
    		    			<?php }} ?>
		    			  </ul>
    					</div>
    					<?php } else { ?>
      					<?php if  (!empty($firsttitle)) { ?>
        					<div class="col-md-8">
        						<ul>
        							<?php foreach($title as $titleitem) { ?>
        								<li><?php echo $titleitem['_title']; ?><?php if (!empty($titleitem['_name'])){ echo ', ' . $titleitem['_name']; }?></li>
        							<?php } // END FOREACH ?>
      		    			</ul>
        					</div>
  		    			<?php } // END IF TITLE / FACULTY TAXONOMY NOT SET ?>
    					<?php } ?>
  					<div class="col-md-4 single-profile-contact">
  						<?php if  ( !empty($email) || !empty($phone1) || !empty($phone2) || !empty($phone3) || !empty($afullname) || !empty($aphone) || !empty($pubmedURL) ) { ?>
  			    			<div id="profile-contact" aria-labelledby="profile-contact">

  								<?php if  (!empty($email)) { ?>
  								<span class="fa fa-envelope-o" aria-hidden="true"></span> <a href="mailto:<?php echo $email; ?>"><?php echo $theName; ?><?php if (!empty($degrees)){ ?><?php echo ', '. $degrees; ?><?php } ?></a><br/>
  								<?php } ?>

  								<?php if  (!empty($phone1)) { ?>
  								<span class="fa fa-phone" aria-hidden="true"></span> <?php echo $phone1; ?><br/>
  								<?php } ?>

  								<?php if  (!empty($phone2)) { ?>
  								<span class="fa fa-phone" aria-hidden="true"></span> <?php echo $phone2; ?><br/>
  								<?php } ?>

  								<?php if  (!empty($phone3)) { ?>
  								<span class="fa fa-phone" aria-hidden="true"></span> <?php echo $phone3; ?><br/>
  								<?php } ?>

  								<?php if  (!empty($fax)) { ?>
  								<span class="fa fa-fax" aria-hidden="true"></span> <?php echo $fax; ?><br/>
  								<?php } ?>
  								<?php if  ( (!empty($afullname)) || (!empty($aphone)) || (!empty($acontent)) ){ ?>
  								  <?php if (!empty($alabel)) { ?>
      								<strong><?php echo $alabel; ?></strong><br/>
    								<?php } ?>
    								<?php if ( (!empty($aemail)) || (!empty($aphone)) || (!empty($acontent)) ) { ?>
  					    			<span class="profile-assistant">
  					    				<?php if (!empty($aemail)) { ?>
    					    				<span class="fa fa-envelope-o" aria-hidden="true"></span>
    					    				<a href="mailto:<?php echo $aemail; ?>">
                          <?php if (!empty($afullname)) { echo $afullname; } else { echo 'Contact Assistant'; } ?>
                          </a><br />
  					    				<?php } ?>
  					    			<?php if  (!empty($aphone)) { ?>
      									<span class="fa fa-phone" aria-hidden="true"></span> <?php echo $aphone; ?> Assistant<br/>
    									<?php } ?>
  					    			<?php if  (!empty($acontent)) { ?>
      									<?php echo $acontent; ?>
    									<?php } ?>
    									</span>
  				    			<?php } ?>
				    			<?php } ?>

  							</div>
  						<?php } ?>
  					</div><!-- END .col-md-4 -->
  				</div><!-- END .row -->

  			</div><!-- END .col-md-9 -->
  		</div><!-- END .row .single-profile-details -->

  		<div class="row" role="main" aria-labelledby="sfp-tab">

  			<div id="left-sidebar" class="col-md-3 single-post-meta" role="navigation" aria-label="left-sidebar">
  				<ul class="nav secondarynav">
  	    			<?php if ( !empty($bio) ) { ?>
  	    				<li class="nav-item<?php if ( !empty($bio) ) { echo ' active'; } ?>"><a href="#bio" data-toggle="tab">Biography</a></li>
  					<?php } ?>
  	    			<?php if ( !empty($educationtop) ) { ?>
    	    			<li class="nav-item<?php if ( empty($bio) && !empty($educationtop) ) { echo ' active'; } ?>"><a href="#educationtop" data-toggle="tab">Education &amp; Training</a></li>
  					<?php } ?>
  	    			<?php if ( !empty($contactinfo) ) { ?>
  	    				<li class="nav-item<?php if ( empty($bio) && empty($educationtop) && !empty($contactinfo) ) { echo ' active'; } ?>"><a href="#contactinfo" data-toggle="tab">Contact Information</a></li>
    	    		<?php } ?>
  	    			<?php if ( !empty($clinical_interests) || !empty($research_interests) ) { ?>
  	    			<?php $areas_interests = 1; ?>
  	    				<li class="nav-item<?php if ( empty($bio) && empty($educationtop) && empty($contactinfo) && !empty($areas_interests) ) { echo ' active'; } ?>"><a href="#areas_interests" data-toggle="tab">Areas of Interests</a></li>
  	    			<?php } ?>
  	    			<?php if ( !empty($researchinfo) ) { ?>
  	    				<li class="nav-item<?php if ( empty($bio) && empty($educationtop) && empty($contactinfo) && empty($areas_interests) && !empty($researchinfo) ) { echo ' active'; } ?>"><a href="#research" data-toggle="tab">Research Information</a></li>
    	    		<?php } ?>
  	    			<?php if ( !empty($publicationinfo) || $pubmedURL ) { ?>
  	    			  <?php $pub_all = 1; ?>
  	    				<li class="nav-item<?php if ( empty($bio) && empty($educationtop) && empty($contactinfo) && empty($areas_interests)  && empty($researchinfo) && !empty($pub_all) ) { echo ' active'; } ?>"><a href="#publications" data-toggle="tab">Publications</a></li>
  	    			<?php } ?>
  	    			<?php if ( !empty($additionalinfo) ) { ?>
  	    				<li class="nav-item<?php if ( empty($bio) && empty($educationtop) && empty($contactinfo) && empty($areas_interests) && empty($researchinfo) && empty($publication_all) && !empty($additionalinfo) ) { echo ' active'; } ?>">
  	    				<?php ?>
    	    				<a href="#<?php echo $additionaltitleurl; ?>" data-toggle="tab"><?php echo $additionaltitle; ?></a>
  	    				</li>
  	    			<?php } ?>
  	    			<?php if ( !empty($cv) ) { ?>
  							<li><a target="_blank" href="<?php echo $cv; ?>" title="Access my CV">Access my CV</a></li>
    					<?php } ?>
      			</ul>
  			</div>

  			<div id="sfp-tab" class="col-md-6" aria-label="sfp-tab">
      			<?php if  ( (!empty($bio)) || (!empty($educationtop)) || (!empty($contactinfo)) || (!empty($clinical_interests)) || (!empty($research_interests)) || (!empty($researchinfo)) || (!empty($publicationinfo)) || (!empty($additionalinfo)) || (!empty($cv)) || (!empty($propublicaURL)) ) { ?>
  					<div class="tab-content">

  					  <?php if (!empty($bio)){ ?>
    					  <div class="tab-pane<?php if ( !empty($bio) ) { echo ' in active'; } ?> fade" id="bio">
    					  	<h3>Biography</h3>
    					  	<?php echo $bio; ?>
    					  </div>
  					  <?php } ?>

  					  <?php if ( !empty($educationtop) ) { ?>
    					  <div class="tab-pane<?php if ( empty($bio) && !empty($educationtop) ){ echo ' in active';} ?> fade" id="educationtop">
    					  	<h3>Education</h3>
    		    			<dl class="dl-horizontal">
    		    				<?php foreach($education as $eduitem) { ?>
    		    				<dt><?php echo $eduitem['_degree']; ?></dt>
    		    				<dd><?php echo $eduitem['_detail']; ?></dd>
    		    				<?php } ?>
    		    			</dl>
    					  </div>
  					  <?php } ?>

      				<?php if ( !empty($contactinfo) ) { ?>
  	    				<div class="tab-pane<?php if ( empty($bio) && empty($educationtop) && empty($areas_interests) && !empty($contactinfo) ) { echo ' in active'; } ?> fade" id="contactinfo">
  		    				<h3>Contact Information</h3>
  		    				<?php echo $contactinfo; ?>
  	    				</div>
      				<?php } ?>

  					  <?php if ( !empty($clinical_interests) || !empty($research_interests) ) { ?>
    					  <div class="tab-pane<?php if ( empty($bio) && empty($educationtop) && empty($contactinfo) && !empty($areas_interests) ) { echo ' in active'; } ?> fade" id="areas_interests">
    					  	<h3>Areas of Interests</h3>

    		    				<?php if ( !empty($clinical_interests) ) { ?>
    		    				<h4>Clinical Interests</h4>
    		    				<div><?php echo $clinical_interests; ?></div>
    		    				<?php } ?>

    		    				<?php if ( !empty($clinical_interests) && !empty($research_interests) ) { echo '<hr />'; } ?>

    		    				<?php if ( !empty($research_interests) ) { ?>
    		    				<h4>Research Interests</h4>
    		    				<div><?php echo $research_interests; ?></div>
    		    				<?php } ?>

    					  </div>
  					  <?php } ?>

      				<?php if ( !empty($researchinfo) ) { ?>
  	    				<div class="tab-pane<?php if ( empty($bio) && empty($educationtop) && empty($contactinfo) && empty($areas_interests) && !empty($researchinfo) ) { echo ' in active'; } ?> fade" id="research">
  		    				<h3>Research Information</h3>
  		    				<?php echo $researchinfo; ?>
  	    				</div>
      				<?php } ?>

  					  <?php if ( !empty($pub_all) ) { ?>
    					  <div class="tab-pane<?php if ( empty($bio) && empty($educationtop) && empty($contactinfo) && empty($areas_interests) && empty($researchinfo) && !empty($publicationinfo) ) { echo ' in active'; } ?> fade" id="publications">
  						  	<h3>Publications</h3>

      				  	<?php if ( !empty($pubmedURL) ) { ?>
      				  		<div id="pubmedlink">
      					  		<a href="<?php echo $pubmedURL; ?>" title="Read my PubMed publications" target="_blank">Read my PubMed publications</a>
      							</div>
      						<?php } ?>
  					  		<?php if ( !empty($publicationinfo) ) { ?>
  					  		  <h4>Publication Information</h4>
  						  		<?php echo $publicationinfo; ?>
                  <?php } ?>

    					  </div>
  					  <?php } ?>

  					  <?php if  ( !empty($additionalinfo) ) { ?>
    					  <div class="tab-pane<?php if ( empty($bio) && empty($educationtop) && empty($contactinfo) && empty($areas_interests) && empty($researchinfo) && empty($publication_all) && !empty($additionalinfo) ) { echo ' in active'; } ?> fade" id="<?php echo $additionaltitleurl; ?>">
    					  	<h3><?php echo $additionaltitle; ?></h3>
    					  	<?php echo $additionalinfo; ?>
    					  </div>
  					  <?php } ?>

  					</div>
  				<?php } ?>
  			</div>

  			<div id="right-sidebar" class="col-md-3" role="navigation" aria-label="right-sidebar">
  				<?php if (!empty($utpURL)){?>
  				<div id="UTPhysicians-section" class="bordered-section single-post-meta" aria-label="UTPhysicians-section">

  					<span class="h6 section-header">Schedule an appointment</span>
  					<a target="_blank" title="Find more about my practice in UTPhysicians Website" href="<?php echo $utpURL; ?>"><img alt="UTPhysicians" src="<?php echo get_template_directory_uri(); ?>/library/includes/1.0.1/logos/utp-btn-logo.png" class="img-fluid utp-logo"></a>
  				</div>
  				<?php } ?>

	        <?php
	        $newsargs = array (
	        	'post_type'			=> 'post',
    				'posts_per_page' 	=> 1,
    				'meta_query' => array(
    						array(
    						'key' => '_faculty_faculty',
    						'value'    => $profileID,
    						'compare'    => 'LIKE'
    						))
	         );
	        $newsquery = new WP_Query($newsargs);
		      ?>
  		        <?php if ( $newsquery->have_posts() ) :?>
                <div class="single-post-meta">
      		    	<span class="h6 section-header">Related News</span>
        				<ul class="secondarynav">
      				    <?php while ( $newsquery->have_posts() ) : $newsquery->the_post(); ?>
                    <li><a target="_self" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php endwhile; ?>
                </ul>
                </div>
              <?php endif;
    				wp_reset_query(); ?>

      			<?php /*This shows related pages per faculty */
        			if ( (isset($relatedpages)) && $relatedpages[0] > 0 ) { ?>
        				<div class="single-post-meta">
        				<span class="h6 section-header">Related Pages</span>
        				<ul class="secondarynav">
          				<?php foreach($relatedpages as $relatedpage) { ?>
          					<li><a href="<?php echo get_the_permalink($relatedpage); ?>" target="_blank"><?php echo get_the_title($relatedpage); ?></a></li>
          				<?php } ?>
        				</ul>
        				</div>
        			<?php } ?>

        			<?php if (!empty($firstexternallink)) { ?>
        				<div class="single-post-meta">
        				<span class="h6 section-header">External Links</span>
        				<ul class="secondarynav">
          				<?php foreach($external as $externalitem) { ?>
          					<li><a href="<?php echo $externalitem['_url']; ?>" target="_blank"><?php echo $externalitem['_urltitle']; ?></a></li>
          				<?php } ?>
        				</ul>
        				</div>
        			<?php } ?>

              <?php if (!empty($schedulenow)) { ?>
                <div id="schedulenow-section" class="bordered-section single-post-meta" aria-label="schedulenow-section">
                  <span class="h6 section-header">ScheduleNow</span>
                  <?php echo $schedulenow; ?>
                </div>
              <?php } ?>

      			</div>

      		</div><!-- END .row .single-profile-content -->

  	</div><!-- END .container .single-profile -->

	<?php endwhile; endif; ?>

<?php get_footer(); ?>