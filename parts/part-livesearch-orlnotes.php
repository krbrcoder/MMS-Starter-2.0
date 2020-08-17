
		
		            <!-- LIVE SEARCH -->
			      <div class="row">
							<form id="live-search-orlnotes" action="" class="form-search" method="post">
								<div class="input-group" role="search" aria-label="live search filter">
									<span class="input-group-addon">Search Filter</span>
    							<input type="text" class="form-control" id="filter-orlnotes" placeholder="Search topic ..." name="Search Term" required aria-label="filter">
    							<input class="sr-only" type="submit" value="search">
    							<span id="filter-count-orlnotes" class="input-group-addon"></span>
								</div>
							</form>
			      </div>
			      <!-- END LIVE SEARCH ROW -->

            <script>
            jQuery(document).ready(function() {

            	jQuery("#filter-orlnotes").keyup(function(){

            		// Retrieve the input field text and reset the count to zero
            		var filter = jQuery(this).val(), count = 0;

            		// Loop through the comment list
            		jQuery(".orlnotes-item").each(function(){

            			// If the list item does not contain the text phrase fade it out
            			if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
            				jQuery(this).fadeOut();

            			// Show the list item if the phrase matches and increase the count by 1
            			} else {
            				jQuery(this).show();
            				count++;
            			}
            		});

            		// Update the count
            		var numberItems = count;
            		jQuery("#filter-count-orlnotes").text( count+" matches");
            		//jQuery("#filter-count").text(count);
            	});

            });

            // PREVENT PRESSING RETURN FOR RESULTS
    	      $('#live-search-orlnotes').submit(function(e) {
               if (!$('#filter-orlnotes').val()) {
                   e.preventDefault();
               }
            });

            </script>
