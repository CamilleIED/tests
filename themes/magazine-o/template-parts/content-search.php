<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magazine_O
 */

?>
	<article class="post-grid post-wrap">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-header">
			<?php
			    if( has_post_thumbnail() ) :
			?>
					<div class="thumbnail post-thumb">
					    <a class="image-link" href="#">
					        <?php
					         	the_post_thumbnail( 'magazine-o-thumbnail-4', array( 'class' => 'img-responsive' ) );
					        ?>
					    </a>
					</div>
			<?php
			    endif;
			?>
			<a href="<?php the_permalink(); ?>">
			    <h4><?php the_title(); ?></h4>
			</a>
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
					</div>
			<?php
				endif;
			?>
		</div>
		<div class="post-content">
		    <?php
		     	the_excerpt();
		    ?>
		</div>
	</div>
    </article>
