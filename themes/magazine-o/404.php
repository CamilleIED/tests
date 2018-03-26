<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Magazine_O
 */

get_header(); ?>

<div class="main-page">
    <div class="container">
        <div class="row">
            <!--primary inside -->
            <div class="col-xs-12">
                <div class="error-404 text-center">
                    <h1 class="s"><?php esc_html_e( 'File not Found', 'magazine-o' ); ?></h1>
                    <h3 class="error-404-subtitle"><?php esc_html_e( 'Error 404! Sorry, but we couldn\'t find the content you were looking for.', 'magazine-o' ); ?></h3>
                    <br><br>
                    <span align="center"><a class="btn btn-default" target="_self" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'magazine-o' ); ?></a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
