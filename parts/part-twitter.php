<?php
  /* https://iag.me/socialmedia/build-your-first-twitter-app-using-php-in-8-easy-steps/ */
  
  require_once(THEME_INCLUDE . '/scripts/TwitterAPIExchange.php');

  $cf = get_post_custom($post->ID);
  //echo '<pre>'; print_r($cf); echo '</pre>' ; 
  /* ------- TWITTER INFORMATION -------- */
  if (isset($cf[ '_homepage_twitter_username' ][0])) {
    $username = $cf[ '_homepage_twitter_username' ][0];
  }
  if (isset($cf['_homepage_twitter_count'][0])) {
    $count = $cf[ '_homepage_twitter_count' ][0];
  } else {
    $count = '3';
  }

  /* ------- Service Account info --------
  // ------- DO NOT CHANGE ANYTHING ------- */
  /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
  $settings = array(
      'oauth_access_token' => "18809763-IhHiUKQbf3vCxSvUzpOl3n6h6znqAB0zcQtSZzT4F",
      'oauth_access_token_secret' => "7AM8MmTEJ65ZmCoJYgh82Gcq34k439Us6HLQHfiZN5PSr",
      'consumer_key' => "nA2nXh9U0ZHvMuw47kUBG7PJ5",
      'consumer_secret' => "FFD5pX9qkVLOdnpUl3ibdrEdyBczeSPVhhdVf4FfvN2XfSiT36"
  );
   
  $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
   
  $requestMethod = "GET";
   
  $getfield = '?screen_name='.$username.'&count='.$count;
   
  $twitter = new TwitterAPIExchange($settings);
  $string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
  
  // if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
  if (isset($string)) { ?>
  <div class="container-fluid">
    <div class="twitter-left col-md-1 col-xs-12">
      <span class="fa fa-twitter"></span>
    </div>
    <div class="twitter-right col-md-11 col-xs-12">
      <ul class="ticker">
      <?php foreach($string as $items) {
        $d = DateTime::createFromFormat('D M d H:i:s P Y', $items['created_at']);
        	$dateformat="F j, Y"; // 10 March 2009 - see http://www.php.net/date for details
        	$monthformat = "M"; //month format
        	$dayformat = "j";	//day only format
        	$timeformat="g:ia"; // 12:15am 
        $date = $d->format('F j, Y');
        $time = $d->format('g:i a');
        $text = $items['text'];
        ?>
        <li><a href="https://www.twitter.com/<?php echo $username; ?>"><?php echo $text; ?> &nbsp;&nbsp;<span class="small"><?php echo $date; ?> @ <?php echo $time; ?></span></a></li>
    <?php } ?>
      </ul>
    </div>
  </div>
  <?php } ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/includes/scripts/jquery-1.9.1.js"></script>
  <script>
var hoveredElement=null;

function tick(){
    $('.ticker').filter(function(item){   
                return !$(this).is(hoveredElement)
            }).each(function(){
        $(this).find('li:first').slideUp(function () {                       
            $ticker = $(this).closest('.ticker');
            
            $(this).appendTo($ticker).slideDown();
        });
    });
}
setInterval(tick, 5000);


$(function(){
    $('.ticker').hover(function(){
hoveredElement=$(this);        
    },function(){
        hoveredElement=null;
    });
});
</script>