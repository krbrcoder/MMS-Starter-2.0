<?php
/* Google Calendar Integration with Calendar V3 PHP API */
/* ------- LOADING PHP API DEPENDENCIES --------*/
require_once (BASE. '/google-php-api/1.0/src/Google/Client.php');
require_once (BASE. '/google-php-api/1.0/src/Google/Service/Calendar.php');


/* ------- Service Account info --------
// ------- DO NOT CHANGE ANYTHING ------- */
$client_id = '770824321573-9tegavlk7g6bd48lg0k0j5h69ejj9v2c.apps.googleusercontent.com';
$service_account_name = '770824321573-9tegavlk7g6bd48lg0k0j5h69ejj9v2c@developer.gserviceaccount.com';
$key_file_location = (BASE. '/google-php-api/1.0/src/pkf.p12');

$cf = get_post_custom($post->ID);
//echo '<pre>'; print_r($cf); echo '</pre>' ;
/* ------- CHANGE THIS CALENDAR WITH THE NAME OF THE CALENDAR -------- */
$calendar = $cf[ '_homepage_calname' ][0];
$calcount = $cf[ '_homepage_calcount' ][0];
$calName = $calendar;

$client = new Google_Client();
$client->setApplicationName("Calendar test");
$service = new Google_Service_Calendar($client);
$key = file_get_contents($key_file_location);
$cred = new Google_Auth_AssertionCredentials(
 $service_account_name,
 array('https://www.googleapis.com/auth/calendar.readonly'),
 $key
);

$client->setAssertionCredentials($cred);
$cals = $service->calendarList->listCalendarList();

//print_r($cals);
//exit;

$stampnow =  date(DATE_ATOM, time());
//echo $stampnow;

$utmsParams = array(
					'maxResults'=>$calcount,
					'timeZone'	=> 'America/Chicago',
					'orderBy'=>'startTime',
					'singleEvents' => true,
					'timeMin'	=> $stampnow
					);

$events = $service->events->listEvents($calName, $utmsParams);
	//Setting Date formats
	$dateformat="F j, Y"; // 10 March 2009 - see http://www.php.net/date for details
	$monthformat = "M"; //month format
	$dayformat = "j";	//day only format
	$timeformat="g:ia"; // 12:15am

	?>

      <h3>Upcoming Events</h3>



      	<?php
        foreach ($events->getItems() as $event) {

      		//$gmtTimezone = new DateTimeZone('America/Chicago');

        		//Get Event TimeStamps
        		$alldayeventstamp = $event->getStart()->getDate(); // For all All day event
        		$eventstartstamp = $event->getStart()->getDateTime();
        		$eventendstamp = $event->getEnd()->getDateTime();

        		//Convert to Unix TimeStamps
        		$unixalldayeventstamp = date("U",strtotime($alldayeventstamp));
        		$unixstartstamp = date("U",strtotime($eventstartstamp));
        		$unixendstamp = date("U",strtotime($eventendstamp));

        		//To Central Time
        		$dtstart = date_create_from_format('U', $unixstartstamp);
      		date_timezone_set($dtstart, new DateTimeZone('America/Chicago'));
      		$adjusted_starttimestamp = date_format($dtstart, 'U') + date_offset_get($dtstart);

        		$dtend = date_create_from_format('U', $unixendstamp);
      		date_timezone_set($dtend, new DateTimeZone('America/Chicago'));
      		$adjusted_endtimestamp = date_format($dtend, 'U') + date_offset_get($dtend);

        		//Get custom format for date/time using unix timestamp
        		$alldayeventmonth = date($monthformat, $unixalldayeventstamp);
        		$alldayeventday = date($dayformat, $unixalldayeventstamp);
      //  		$eventdate = date($dateformat, $adjusted_starttimestamp);
        		$eventday = date($dayformat, $adjusted_starttimestamp);
        		$eventmonth = date($monthformat, $adjusted_starttimestamp);
        		$eventstarttime = date($timeformat, $adjusted_starttimestamp);
        		$eventendtime = date($timeformat, $adjusted_endtimestamp);

        		//Get values for Title, Location and Description
        		$eventtitle = $event->getSummary();
        		$eventlocation = $event->getLocation();
        		$eventdescription = $event->getDescription();

        		$eventURL = $event->getHtmlLink();
        	?>

        	<?php /* ------- THIS IS THE MARKUP, YOU CAN CHANGE CLASSES/VARIABLES HERE AS LONG AS THEY ARE DEFINED --------*/ ?>

        	<div class="calendar-entry">
          	<div class="calendar-date-month cal-animation">
            	<span class="date">
                <?php if (($unixstartstamp == $unixendstamp) && ($eventstarttime == $eventendtime)) {
                  echo $alldayeventday;
                } else {
              	  echo $eventday;
            	  } ?>
            	</span>
            	<span class="month">
                <?php if (($unixstartstamp == $unixendstamp) && ($eventstarttime == $eventendtime)) {
                  echo $alldayeventmonth;
                } else {
              	  echo $eventmonth;
            	  } ?>
            	</span>
            </div><!-- CALENDAR DATA MONTH -->

            <div class="calendar-info">
              <span class="calendar-title"><a href="<?php echo $eventURL; ?>" title="<?php echo $eventtitle; ?> on <?php echo $eventmonth; ?> <?php echo $eventday; ?>" target="_blank"><?php echo $eventtitle; ?></a></span>
          		<span class="calendar-time">
                <?php if (($unixstartstamp == $unixendstamp) && ($eventstarttime == $eventendtime)){
        					echo 'All day';
        				} else { ?>
          				<?php echo $eventstarttime; ?> - <?php echo $eventendtime; ?>
        				<?php } ?>
              </span>
          		<?php if (!empty($eventlocation)){ ?>
          			<span class="calendar-location"><?php echo $eventlocation; ?></span>
          		<?php } ?>
          		<?php if (!empty($eventdescription)){ ?>
          		  <span class="calendar-description"><?php echo wp_trim_words( $eventdescription, 4, '...' ); ?> <br /><a href="<?php echo $eventURL; ?>" title="Click for more information on <?php echo $eventtitle; ?> on <?php echo $eventmonth; ?> <?php echo $eventday; ?>"  class="readmore" target="_blank">Read More &raquo;</a></span>

          		<?php } ?>
        		</div>
        	</div>
      	<?php }//Ending For Each


      if (count($events->getItems()) < 1 ){
      	echo '<p>No events scheduled. Please contact your website administrator.</p>';
      }
    ?>