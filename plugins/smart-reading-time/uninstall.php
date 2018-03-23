<?php
 
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) 
	exit();
 
$option_name = 'srt_reading_time_options';
 
delete_option( $option_name );
 
// For site options in Multisite
delete_site_option( $option_name );