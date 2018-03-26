<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magazine_O
 */

?>
	<article id="post-<?php the_ID(); ?>" class="post-grid post-wrap">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="single-title-con">
            <div class="single-title">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
        <!--/block title -->


        <!--block main -->
        <div class="block-main-container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                	<?php
                		if( has_post_thumbnail() ) :
                	?>
                        <div class="thumbnail post-thumb featured-image">
                            <figure>
                            	<?php
                            		the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
                            	?>
                            </figure>
                        </div>
                    <?php
                    	endif;

                    	the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magazine-o' ),
							'after'  => '</div>',
						) );
                    ?>
                </div>
            </div>
        </div>
        <!--/block main -->

        <?php if ( get_edit_post_link() ) : ?>
			<div class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'magazine-o' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</div><!-- .entry-footer -->
		<?php endif; ?>
    </div>
    </article>
