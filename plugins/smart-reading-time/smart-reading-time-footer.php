    <?php echo '<h3 class="title">' . __( 'Shortcode', 'smart-reading-time-tdom' ) . '</h3>'; ?>

    <span><?php _e('Use the', 'smart-reading-time-tdom'); ?> Shortcode&nbsp;: <code>[srt_reading_time designation="<?php _e('Reading Time: ', 'smart-reading-time-tdom'); ?>"]</code>.<br><br>
    <?php _e('Or simply use', 'smart-reading-time-tdom'); ?>&nbsp;: <code>[srt_reading_time]</code> <?php _e('to return the number with no designation', 'smart-reading-time-tdom'); ?>.<br><br></span>
    
    <?php echo '<h3 class="title">' . __( 'Theme', 'smart-reading-time-tdom' ) . '</h3>'; ?>
    
	<span><?php _e('If you want to insert the reading time into your theme', 'smart-reading-time-tdom'); ?>&nbsp;: <code>do_shortcode('[srt_reading_time]')</code>.<br><br></span>
    
	<?php echo '<h3 class="title">' . __( 'CSS Properties', 'smart-reading-time-tdom' ) . '</h3>'; ?>
    
	<span><?php _e('This section contains informations about of the CSS properties belonging to the plugin', 'smart-reading-time-tdom'); ?>.<br></span>
    
    <span><?php _e('Copy and paste the following code into your <code>style.css</code> stylesheet', 'smart-reading-time-tdom'); ?>.<br><br></span>
    
<p>
<textarea name="moderation_keys" rows="12" cols="12" id="css_keys" class="large-text code" style="max-width: 570px;">
<!-- Smart Reading Time custom CSS - Start -->

/* Smart Reading Time - Div. CSS */

.srt-reading-time {}

/* Smart Reading Time - Span. CSS */

.srt-designation {}

.srt-time {}
</textarea>
</p>
<span><br><br></span>
</div>
<!-- end of wrap -->
<div class="clear"></div>
<!-- footer -->
<div class="card">
<h3 class="title"><span class="dashicons dashicons-admin-plugins"></span> Smart Reading Time Support</h3>
<span class="info-sb" style="padding: 5%;">
<p><?php _e('Smart Reading Time is a free WordPress plugin written by', 'smart-reading-time-tdom'); ?> <a href="http://sebastienbosquet.com" target="_blank">S&eacute;bastien Bosquet</a>.</p>
<p><?php _e('For help and support using this plugin, please', 'smart-reading-time-tdom'); ?> <a href="http://sebastienbosquet.com/support/" target="_blank"><?php _e('contact me', 'smart-reading-time-tdom'); ?></a> <?php _e('directly', 'smart-reading-time-tdom'); ?>.</p>
<p><?php _e('And if you prefer to use Twitter', 'smart-reading-time-tdom'); ?></p>
<br></span>
<a href="https://twitter.com/intent/tweet?screen_name=Galice&text=I%20have%20a%20problem%20with%20the%20plugin%20%23SmartReadingTime" class="twitter-mention-button" data-size="large" data-related="Galice">Tweet to @Galice</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>