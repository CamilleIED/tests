<?php
/**
 * Plugin Name: Smart Reading Time
 * Plugin URI: http://sebastienbosquet.com
 * Description: Estimates an average required time to complete reading a post.
 * Version: 1.2
 * Author: Sebastien Bosquet
 * Author URI: http://sebastienbosquet.com
 */
 
 /*  Copyright 2016 - Sebastien Bosquet

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

add_action( 'plugins_loaded', 'smart_reading_time_load_languages' );

function smart_reading_time_load_languages() {

load_plugin_textdomain( 'smart-reading-time-tdom', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 

}

class SmartReadingTimeWP {
	
	// Add label option using add_option if it does not already exist
	public $SmartReadingTime;
	
	public function __construct() {
		$defaultSettings = array(
			'designation' => 'Reading Time: ',
			'timefix' => 'minutes',
			'wpm' => 300,
			'before_content' => 'true',
		);
		
		$srtReadingOptions = get_option('srt_reading_time_options');
		
		add_shortcode( 'srt_reading_time', array($this, 'srt_reading_time') );
		add_option('srt_reading_time_options', $defaultSettings);
		add_action('admin_menu', array($this, 'srt_reading_time_admin_actions'));
				
		if ( $srtReadingOptions['before_content'] == 'true' ) {
			
		add_filter('the_content', array($this, 'srt_add_reading_time_before_content'));
		add_filter('get_the_excerpt', array($this, 'srt_add_reading_time_before_excerpt'));

		}
	}
	
	public function srt_calculate_reading_time($srtPostID, $srtOptions) {
		
		$srtContent = get_post_field('post_content', $srtPostID);
		$strippedContent = strip_shortcodes($srtContent);
		$stripTagsContent = strip_tags($strippedContent);
		$wordCount = str_word_count($stripTagsContent);
		$m = floor( $wordCount / $srtOptions['wpm'] );
		$s = floor( $wordCount % $srtOptions['wpm'] / ( $srtOptions['wpm'] / 60 ) );
		$minute = __( ' minute', 'smart-reading-time-tdom');
		$second = __( ' second', 'smart-reading-time-tdom');
		$sep = __( ' and ', 'smart-reading-time-tdom');
		
		$this->SmartReadingTime = ( $m == 0 ? '' : $m ) . ( $m == 0 ? '' : $minute ) . ( $m <= 1 ? '' : 's') . ( $m == 0 ? '' : $sep ) . $s . $second . ($s == 1 ? '' : 's');
		
		return $this->SmartReadingTime;
		
	}
	
	public function srt_reading_time($atts, $content = null) {
		
		extract (shortcode_atts(array(
			'designation' => '',
			'timefix' => '',
		), $atts));
			
		$srtReadingOptions = get_option('srt_reading_time_options');
		
		$srtPost = get_the_ID();
		
		$this->srt_calculate_reading_time($srtPost, $srtReadingOptions);
				
		return "
		<span class='span-reading-time'>$designation $this->SmartReadingTime</span>
		";
		
	}
	
	// Functions to create Reading Time admin pages
	public function srt_reading_time_admin() {
	    include('srt-reading-time-admin.php');
	}
	
	public function srt_reading_time_admin_actions() {
		add_options_page("Smart Reading Time Settings", "Smart Reading Time", "manage_options", "srt-reading-time-settings", array($this, "srt_reading_time_admin"));
	}
	
	// Calculate reading time by running it through the_content
	
	public function srt_add_reading_time_before_content($content) {
		
		$srtReadingOptions = get_option('srt_reading_time_options');

		$originalContent = $content;
		$srtPost = get_the_ID();
		
		$this->srt_calculate_reading_time($srtPost, $srtReadingOptions);
				
		$designation = $srtReadingOptions['designation'];
		
		
		if(in_array('get_the_excerpt', $GLOBALS['wp_current_filter'])) { 
			return $content;
		}
		// Google : Words between the tags are not indexed as occurring on the current page. <!--googleoff: index--> and <!--googleon: index-->
		$stiff = "\n" . '<!--googleoff: index-->' . "\n";
		$stiff.= '<div class="srt-reading-time">'.'<span class="srt-designation">'.$designation.'</span>'.'<span class="srt-time">'.$this->SmartReadingTime.'</span>'.'</div>';
		$stiff.= "\n" . '<!--googleon: index-->' . "\n";
		
		if ( is_page() || is_search() || is_category() || is_404() || is_archive() ) {
			return $content;
		}
		$content = $stiff;
		$content .= $originalContent;
		return $content;
		
	}
	
	public function srt_add_reading_time_before_excerpt($content) {
		
		$srtReadingOptions = get_option('srt_reading_time_options');

		$originalContent = $content;
		$srtPost = get_the_ID();
		
		$this->srt_calculate_reading_time($srtPost, $srtReadingOptions);
				
		$designation = $srtReadingOptions['designation'];
		
		// Google : Words between the tags are not indexed as occurring on the current page. <!--googleoff: index--> and <!--googleon: index-->
		$stiff = "\n" . '<!--googleoff: index-->' . "\n";
		$stiff .= '<div class="srt-reading-time">'.'<span class="srt-designation">'.$designation.'</span>'.'<span class="srt-time">'.$this->SmartReadingTime.'</span>'.'</div>';
		$stiff.= "\n" . '<!--googleon: index-->' . "\n";
		
		if ( is_page() || is_search() || is_category() || is_404() || is_archive() ) {
			return $content;
		}
		$content = $stiff;
		$content .= $originalContent;
		return $content;
		
	}
	
}

$SmartReadingTimeWP = new SmartReadingTimeWP();

/**
 * wp-update-server
 
 **/
require plugin_dir_path( __FILE__ ) .'update/plugin-update-checker.php';
$SBUpdateChecker = PucFactory::buildUpdateChecker(
'http://www.sebastienbosquet.com/plugin-update-server/?action=get_metadata&slug=smart-reading-time',
__FILE__,
'smart-reading-time'
);

?>