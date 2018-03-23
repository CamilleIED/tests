<?php 

	$srtReadingOptions = get_option('srt_reading_time_options');

	

    if($_POST['srt_reading_time_hidden'] == 'Y') {

        //Form data sent

        $SmartReadingTimeDesignation = $_POST['srt_reading_time_designation'];

        $SmartReadingTimeTimefix = $_POST['srt_reading_time_timefix'];

        $SmartReadingTimeWPM = $_POST['srt_reading_time_wpm'];
		
		$SmartReadingTimeAfterSrt = $_POST['srt_reading_time_aftersrt'];

        if ($_POST['srt_reading_time_check']) {

	        $SmartReadingTimeCheck = 'true';

        } else {

	        $SmartReadingTimeCheck = 'false';

        }

        $updateOptions = array(

        	'designation' => $SmartReadingTimeDesignation,

        	'timefix' => $SmartReadingTimeTimefix,

			'wpm' => $SmartReadingTimeWPM,
			
			'aftersrt' => $SmartReadingTimeAfterSrt,

			'before_content' => $SmartReadingTimeCheck,

        );

        

        update_option('srt_reading_time_options', $updateOptions);

        

        ?>

        <div class="updated"><p><span class="dashicons dashicons-yes"></span> <strong>Smart Reading Time - <?php _e('Options saved.', 'smart-reading-time-tdom'); ?></strong></p></div>

        <?php

    } else {

        //Normal page display

        $SmartReadingTimeDesignation = $srtReadingOptions['designation'];

        $SmartReadingTimeTimefix = $srtReadingOptions['timefix'];

        $SmartReadingTimeWPM = $srtReadingOptions['wpm'];
		
		$SmartReadingTimeAfterSrt = $srtReadingOptions['aftersrt'];

        $SmartReadingTimeCheck = $srtReadingOptions['before_content'];

    }

?>

<!-- Wrap WordPress -->

<div class="wrap">

    <?php echo "<h2>" . __( 'Smart Reading Time Settings', 'smart-reading-time-tdom' ) . "</h2>"; ?>

    <div class="card">

    <?php echo '<h3 class="title">' . __( 'An adult reads about 300 words per minute on an average', 'smart-reading-time-tdom' ) . '</h3>'; ?>

    <?php echo '<p>' . __( 'Studies reveal that an average individual in business reads no faster than what people did nearly 10 decades back. As such, the average reading speed also varies based on an individual’s profession. On a broader spectrum, an adult reads about 300 words per minute on an average. On the other hand, a college student reads about 450 words per minute on an average. The increase in speed is primarily because a student is exposed to more reading activities in comparison to an adult. The increased practice definitely offers an upper edge over here, when it comes to speed reading. It’s estimated that a student spends nearly 4-5 hours a day for reading or studying activities.', 'smart-reading-time-tdom' ) . '</p>'; ?>

    </div>

    <!-- Options -->

    <table class="form-table">

     

    <form name="srt_reading_time_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

    	<input type="hidden" name="srt_reading_time_hidden" value="Y">

                

        <h3 class="title"><span class="dashicons dashicons-clock"></span> Smart Reading Time</h3>

        

        <tbody>

        <tr>

		<th scope="row"><label for="srt_reading_time_designation"><?php _e('Reading time designation: ', 'smart-reading-time-tdom'); ?></label></th>

		<td><input name="srt_reading_time_designation" value="<?php echo $SmartReadingTimeDesignation; ?>" class="regular-text ltr" type="text">

        <p class="description" id="tagline-description"><?php _e('This value appears before the reading time. Leave blank for none.', 'smart-reading-time-tdom'); ?></p></td>

		</tr>



        <tr>

		<th scope="row"><label for="srt_reading_time_wpm"><?php _e('Words per minute: ', 'smart-reading-time-tdom'); ?></label></th>

		<td><input name="srt_reading_time_wpm" value="<?php echo $SmartReadingTimeWPM; ?>" class="regular-text ltr" type="text">

        <p class="description" id="tagline-description"><?php _e('(defaults to 300, the average reading speed for adults)', 'smart-reading-time-tdom'); ?></p></td>

		</tr>



        <tr>

		<th scope="row"><label for="srt_reading_time_aftersrt"><?php _e('After time: ', 'smart-reading-time-tdom'); ?></label></th>

		<td><input name="srt_reading_time_aftersrt" value="<?php echo $SmartReadingTimeAfterSrt; ?>" class="regular-text ltr" type="text">

        <p class="description" id="tagline-description"><?php _e('This value appears after the reading time. Leave blank for none.', 'smart-reading-time-tdom'); ?></p></td>

		</tr>



        <tr>

		<th scope="row"><?php _e('Insert Smart Reading Time: ', 'smart-reading-time-tdom'); ?></th>

		<td><fieldset><legend class="screen-reader-text"><span><?php _e('before the post content', 'smart-reading-time-tdom'); ?></span></legend><label for="srt_reading_time_check">

		<input name="srt_reading_time_check" <?php if ($SmartReadingTimeCheck === 'true') { echo 'checked'; } ?> type="checkbox">

		<?php _e('before the post content', 'smart-reading-time-tdom'); ?></label>

		</fieldset></td>

		</tr> 

             </tbody>

    </table>  

		

        <p class="submit"><input name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'smart-reading-time-tdom' ) ?>" type="submit"></p>

        

    </form>



<?php

require('smart-reading-time-footer.php');