<?php
/**
 * Template Name: Home Page
 *
 * This is page is used as front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magazine_O
 */
	get_header();

	if( is_active_sidebar( 'sidebar-2' ) ) :
		dynamic_sidebar( 'sidebar-2' );
	endif;
?>
	<div class="main-page">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-8 col-sm-8 col-xs-12">
	            	<div class="primary">
	            		<?php
	            			if( is_active_sidebar( 'sidebar-3' ) ) :
	            				dynamic_sidebar( 'sidebar-3' );
	            			endif;
	            		?>

	            	</div>
	            </div>
	            <?php
	            	get_sidebar();
	            ?>
	        </div>
	        <div class="row">
				<?php
					if( is_active_sidebar( 'sidebar-4' ) ) :
						dynamic_sidebar( 'sidebar-4' );
					endif;
				?>
	        </div>
	    </div>
	</div>
<?php
	get_footer();
