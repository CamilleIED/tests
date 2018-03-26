<?php
/**
 * Template part for displaying post content in single.php
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
                <h1><?php the_title(); ?></h1>
            </div>
            <?php
            	if( get_post_type() === 'post' ) :
            ?>
		            <div class="post-meta post-meta-a">
		                <span class="meta-item post-author">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="">
								<?php echo esc_html( get_the_author() ); ?>
							</a>
						</span>
						<span class="meta-item post-date"><?php echo get_the_date(); ?></span>
		                <span class="meta-item post-comment">
		                	<a href="#">
			                	<i class="fa fa-comments"></i>
			                	<?php if( comments_open() || get_comments_number() ) { echo esc_html( get_comments_number() ); } ?>
			                </a>
			            </span>
		            </div>
            <?php
            	endif;
            ?>
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

                    ?>
                </div>
            </div>
        </div>
        <!--/block main -->
    </div>
    </article>
