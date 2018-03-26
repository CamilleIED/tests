<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<?php
						while( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', 'single' );

							the_post_navigation();

							// Calling function for related posts
							$show_related_posts = get_theme_mod( 'magazine_o_show_related_posts', 1 );

							$related_post_title = get_theme_mod( 'magazine_o_related_post_title', '' );

							$related_post_no = get_theme_mod( 'magazine_o_related_post_no', 3 );

					        $qargs = array(
					            'no_found_rows'       => true,
					            'ignore_sticky_posts' => true,
					            'posts_per_page'      => absint( $related_post_no )
					        );

					        $current_object = get_queried_object();

					        if ( $current_object instanceof WP_Post ) {
					            $current_id = $current_object->ID;

					            if ( absint( $current_id ) > 0 ) {
					                // Exclude current post.
					                $qargs['post__not_in'] = array( absint( $current_id ) );

					                // Include current posts categories.
					                $categories = wp_get_post_categories( $current_id );
					                if ( ! empty( $categories ) ) {
					                    $qargs['tax_query'] = array(
					                        array(
					                            'taxonomy' => 'category',
					                            'field'    => 'term_id',
					                            'terms'    => $categories,
					                            'operator' => 'IN',
					                            )
					                        );
					                }
					            }
					        }

					        $related_posts = new WP_Query( $qargs );

							if( $related_posts->have_posts() && $show_related_posts == 1 ) :
							?>
								<div class="related-post block">
									<?php
										if( $related_post_title ) :
									?>
	                                		<div class="section-title">
	                                			<?php echo esc_html( $related_post_title ); ?>
	                                		</div>
	                                <?php
	                                	endif;
	                                ?>
	                                <!--block layout c -->
	                                <div class="block block-layout-c">
	                                    <!--block main -->
	                                    <div class="block-main-container">
	                                        <!--carousel-->
	                                        <div id="carousel3" class="carousel slide" data-ride="carousel" data-interval="false">
	                                            <div class="carousel-inner">
	                                                <!--first item-->
	                                                <div class="first-slider row no-gutters item active">
	                                                	<?php
	                                                		while( $related_posts->have_posts() ) :
	                                                			$related_posts->the_post();
	                                                	?>
	                                                    <div class="col-sm-4 col-xs-12">
	                                                        <article class="post-grid post-wrap">
	                                                            <div class="caption-inside">
	                                                            	<?php
	                                                            		if( has_post_thumbnail() ) :
	                                                            	?>
	                                                                    <a href="#">
																	        <?php
																	         	the_post_thumbnail( 'magazine-o-thumbnail-6', array( 'class' => 'img-responsive' ) );
																	        ?>
																	    </a>
																	<?php
																		endif;
																	?>
	                                                                    <div class="overlay">
	                                                                        <a href="<?php the_permalink(); ?>">
	                                                                        	<h5><?php the_title(); ?></h5>
	                                                                        </a>
	                                                                        <div class="post-meta post-meta-a">
	                                                                            <span class="meta-item post-author">
																					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="">
																						<?php echo esc_html( get_the_author() ); ?>
																					</a>
																				</span>
																				<span class="meta-item post-date"><?php echo get_the_date(); ?></span>
	                                                                        </div>
	                                                                    </div>
	                                                                </div>
	                                                        </article>
	                                                    </div>
	                                                    <?php
	                                                    	endwhile;
	                                                    	wp_reset_postdata();
	                                                    ?>
	                                                </div>
	                                                <!--/first item-->
	                                            </div>
	                                        </div>
	                                        <!--carousel-->
	                                    </div>
	                                </div>
	                                <!--/block layout -->
	                        	</div>
							<?php
							endif;

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
                </div>
            </div>

            <?php
            	if( $sidebar_position == 'right' ) :
            	   get_sidebar();
                endif;
            ?>

        </div>

    </div>
</div>

<?php
get_footer();
