<form id="mainnavsearch" class="navbar-form navbar-right" role="search" action="<?php echo home_url( '/' ); ?>" method="get" >

<button data-target="#searchdept" data-toggle="collapse" class="btn btn-default search" type="submit" name="btnG" role="button" aria-label="Search Button Submit"><span class="sr-only">Search McGovernMed</span><span class="fa fa-search"></span></button>

<button data-target="#searchMcGovernMed" data-toggle="collapse" class="btn btn-default search" type="submit" name="btnG" role="button" aria-label="Search Button Submit"><span class="sr-only">Search McGovernMed</span><span class="fa fa-search"></span></button>

	<div id="searchdept" class="input-group">
		<label for="r" class="sr-only">Search this department</label>
	  <input type="text" placeholder="Search Site..." class="form-control search-query" name="s" id="r">

	  <span id="404search" class="input-group-btn">

	  <button type="submit" class="btn btn-default"><span class="fa fa-search"></span><span class="sr-only">Submit</span></button>

	  </span>

	</div>  
	
	<div id="searchMcGovernMed" class="input-group search-this-dept">
		<label for="q" class="visuallyhidden sr-only">Search McGovern Medical School</label>
		<input class="txt form-control search-field" type="text" placeholder="Search McGovernMed..." id="q" name="q" maxlength="255" />
		<input type="hidden" name="entqr" value="0" />
		<input type="hidden" name="output" value="xml_no_dtd" />
		<input type="hidden" name="sort" value="date:D:L:d1" />
		<input type="hidden" name="client" value="medfrontend" />
		<input type="hidden" name="ud" value="1" />
		<input type="hidden" name="oe" value="UTF-8" />
		<input type="hidden" name="ie" value="UTF-8" />
		<input type="hidden" name="proxystylesheet" value="medfrontend" />
		<input type="hidden" name="proxyreload" value="1" />
		<input type="hidden" name="site" value="medcollection" />

	  <span id="404search" class="input-group-btn">

	  <button type="submit" class="btn btn-default" id="submit"><span class="fa fa-search"></span><span class="sr-only">Submit</span></button>

	  </span>

	</div>  
	
</form>