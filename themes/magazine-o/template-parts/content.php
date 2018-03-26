<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magazine_O
 */
$default_image = array( '1' => '1.jpg', '2' => '2.jpg', '3' => '3.jpg', '4' => '4.jpg' );
?>
	<article class="post-grid post-wrap">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-header">
			<?php
			    if( has_post_thumbnail() ) :
			?>
					<div class="thumbnail post-thumb">
					    <a class="image-link" href="<?php the_permalink(); ?>">
					        <?php
					         	the_post_thumbnail( 'magazine-o-thumbnail-4', array( 'class' => 'img-responsive' ) );
					        ?>
					    </a>
					</div>
			<?php else:
			?>	
			<div class="thumbnail post-thumb">
					    <a class="image-link" href="<?php the_permalink(); ?>">
					    	<?php $i = rand ( 1 ,4 );
					    		$image = get_template_directory_uri() . '/ocean-themes/assets/img/' . $default_image[$i]; ?>
					        <img src="<?php echo esc_url($image); ?>"  class='img-responsive'/>
					    </a>
					</div>	
			<?php
				endif;
			?>
			<a href="<?php the_permalink(); ?>">
			    <h4><?php the_title(); ?></h4>
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
			<div class="post-content">
			    <?php
			     	the_excerpt();
			    ?>
			   <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('Countinue Reading','magazine-o'); ?></a>
			</div>
		</div>
    </article>