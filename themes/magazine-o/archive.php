<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magazine_O
 */

get_header(); ?>

<div class="main-page">
    <div class="container">

        <div class="row">
            <?php
                $sidebar_position   = get_theme_mod( 'magazine_o_sidebar_position', 'right' );
                $class              = '';
                if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar-1' ) ) :
                    $class = 'col-md-12';
                else :
                    $class = 'col-md-8 col-sm-8 col-xs-12';
                endif;
                if( $sidebar_position == 'left' ) :
                    get_sidebar();
                endif;
            ?>

            <!--primary inside -->
            <div class="<?php echo esc_attr( $class ); ?>">
                <div class="primary">
                    <!--block layout d, block archive layout a-->
                    <div class="block block-layout-d block-archive block-archive-layout-a">
                        <!--block title -->
                        <div class="archive-title-con">
                            <div class="archive-title">
                                <?php
									the_archive_title();
								?>
                            </div>
                        </div>
                        <!--/block title -->
                        <!--block main -->
                        <div class="block-main-container">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php
                                    	if ( have_posts() ) :
	                                    	/* Start the Loop */
											while ( have_posts() ) : the_post();

												/*
												 * Include the Post-Format-specific template for the content.
												 * If you want to override this in a child theme, then include a file
												 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
												 */
												get_template_part( 'template-parts/content', 'archive' );

											endwhile;

											the_posts_pagination( 
												array(
													'mid_size' 	=> 2,
													'prev_text' => esc_html__( '&laquo;', 'magazine-o' ),
													'next_text' => esc_html__( '&raquo;', 'magazine-o' ),
												) 
											);

										else :

											get_template_part( 'template-parts/content', 'none' );

										endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!--/block main -->

                    </div>
                    <!--/block layout -->

                </div>
            </div>
            <!--/primary inside
            =================-->


            <!--sidebar inside
            =================-->
            <?php
                if( $sidebar_position == 'right' ) :
            	   get_sidebar();
                endif;
            ?>
            <!--/sidebar inside
            =================-->

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
