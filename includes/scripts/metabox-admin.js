(function($){
	$(document).ready(function() {

	    var $page_template = $('#page_template'),

	        $slider = $('#slider'),
	        $external = $('#external'),
	        $additional = $('#additional'),
	        $modules = $('#modules'),
	        $homepage = $('#homepage'),
	        $contact = $('#contact'),
	        $video = $('#video'),
	        $tabbed = $('#tabs'),
	        $servicemenu = $('#service_menu'),
	        $tiledoptions = $('#tiledoptions'),
	        $tiledlistings = $('#staff'),
	        $livesort = $('#livesort'),

	        $facultypageoptions = $('#facultypageoptions'),
	        $pagefacultymetabox = $('#facultypagev2div'); // LAST ONE MUST ALWAYS HAVE A SEMI-COLON!!!


          // BOXES TO HIDE ON ALL PAGES
	        $slider.hide();
	        $modules.hide();
	        $homepage.hide();
	        $contact.hide();
            $video.hide();
	        $tabbed.hide();
	        $tiledoptions.hide();
	        $tiledlistings.hide();
	        $servicemenu.hide();
	        $livesort.hide();
	        $facultypageoptions.hide();
	        $pagefacultymetabox.hide();

	    $page_template.change(function() {

	        if ($(this).val() == 'page-template-home.php') {
	            $slider.show();
	            $modules.show();
	            $homepage.show();
	            $video.show();
	            $servicemenu.show();
	            $external.hide();
	            $additional.hide();
	        }

	        if ($(this).val() == 'page-template-slide.php') {
	            $slider.show();
	        }

	        if ($(this).val() == 'page-template-tabbed.php') {
	            $tabbed.show();
	        }

	        if ($(this).val() == 'page-template-tiled.php') {
	            $tiledoptions.show();
	            $tiledlistings.show();
	        }

	        if ($(this).val() == 'page-template-facultylisting.php') {
	            $facultypageoptions.show();
              $pagefacultymetabox.show();
	        }

	        if ($(this).val() == 'page-template-divisionfaculty.php') {
	            $facultypageoptions.show();
              $pagefacultymetabox.show();
	        }

	        if ($(this).val() == 'page-template-contact.php') {
	            $contact.show();
	        }

	        if ($(this).val() == 'page-template-servicepage.php') {
              $servicemenu.show();
	        }

	        if ($(this).val() == 'page-template-livesort.php') {
              $livesort.show();
	        }


	    }).change();

	});
})(jQuery);