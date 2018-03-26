<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine_O
 */

?>

	<footer>
	    <div class="container">
	    	<?php
	    		if( is_active_sidebar( 'footer-1' ) ) :
	    	?>
	        <div class="row">
	        	<?php
	        		dynamic_sidebar( 'footer-1' );
	        	?>
	        </div>
	        <?php
	        	endif;
	        ?>
	        <div class="row">
	            <div class="ft-btm">
	                <div class="col-xs-12 ft-hr">
	                    <hr/>
	                </div>
	                <div class="col-sm-6 col-xs-12">
	                    <div class="copyright">
	                       <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'magazine-o' ) ); ?>"><?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( 'Proudly powered by %s', 'magazine-o' ), 'WordPress' );
							?></a>
							<span class="sep"> | </span>
							<?php
								/* translators: 1: Theme name, 2: Theme author. */
								printf( esc_html__( 'Theme: %1$s by %2$s.', 'magazine-o' ), 'Magazine O', '<a href="http://ocean-themes.com">ocean-themes.com</a>' );
							?>
	                    </div>
	                </div>
	                <div class="col-sm-6 col-xs-12">
	                    <div class="ft-menu">
	                    	<?php
	                    		if( has_nav_menu( 'footer_menu' ) ) :
	                    			wp_nav_menu( array(
	                    				'theme_location' => 'footer_menu',
	                    			) );
	                    		endif;
	                    	?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
