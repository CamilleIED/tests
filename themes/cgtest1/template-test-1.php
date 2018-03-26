<?php
/*
Template Name: Template test 1
Template Post Type: post, page, product
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
	            
	        </div>
	        
	    </div>
	</div>
<?php
	get_footer();
