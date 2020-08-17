<?php get_header(); ?>

	<div id="top" class="container" role="banner" aria-label="top">
		<div id="titlebar" class="titlecontent col-md-12">
			<h2>Faculty</h2>
		</div><!--end of span-->
	</div>

	<div id="page" class="maincontent" role="main" aria-labelledby="main">
	    <div id="main" class="container">
  		  <?php get_template_part('parts/part', 'livesearch'); ?>

  			<div class="row">
  				<div class="col-md-12 facultylisting">
            	<div id="faculty-section" class="row articlesection" aria-labelledby="faculty-section">
        		    <?php get_template_part('parts/part', 'archivefacultylisting'); ?>
            	</div>
		    	</div><!-- END .col-md-12 .facultylisting -->
			</div><!-- END .row -->
    </div><!-- END .container-->
	</div><!-- END .maincontent-->

<?php get_footer(); ?>
