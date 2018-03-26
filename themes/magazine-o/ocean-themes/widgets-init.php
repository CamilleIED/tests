<?php
/**
 * Load Widgets.
 *
 * @package Magazine_O
 */

// Load Featured News Widgets.
require_once trailingslashit( get_template_directory() ) . '/ocean-themes/widgets/widget-featured-news.php';
require_once trailingslashit( get_template_directory() ) . '/ocean-themes/widgets/widget-news-layouts.php';
require_once trailingslashit( get_template_directory() ) . '/ocean-themes/widgets/widget-sidebar.php';


// Register Widget

if ( ! function_exists( 'magazine_o_register_widget' ) ) :

    /**
     * Load widget.
     *
     * @since 1.0.0
     */
    function magazine_o_register_widget() {

    	// Featured Post Widget
        register_widget( 'Magazine_O_Featured_Posts' );

        /**-------- Front Page Top Widgets ---------**/
        // News Block Layout One
        register_widget( 'Magazine_O_News_Block_One' );

        // News Block Layout Two
        register_widget( 'Magazine_O_News_Block_Two' );

        // News Block Layout Three
        register_widget( 'Magazine_O_News_Block_Three' );

        // Sidebar Post Widget Three
        register_widget( 'Magazine_O_Post_Widget_Three' );
    }

endif;

add_action( 'widgets_init', 'magazine_o_register_widget' );

?>