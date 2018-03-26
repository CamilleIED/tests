<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magazine_O
 */

?>
<article class="post-grid post-wrap post single single-post">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-title-con">
        <div class="single-title">

            <h1><?php esc_html_e( 'Not Found', 'magazine-o' ); ?></h1>

            <p><?php esc_html_e( 'Sorry, but the requested resource was not found on this site.', 'magazine-o' ); ?></p>

        </div>

    </div>
</div>
</article>
