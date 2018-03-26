<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine_O
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
		$enable_top_header = get_theme_mod( 'magazine_o_show_top_header', 1 );
		if( $enable_top_header == 1 ) :
	?>
			<!--header infobar-->
			<div class="hdr-infobar">
			    <div class="container">
			        <div class="row">
			        	<?php
			        		$enable_current_date = get_theme_mod( 'magazine_o_show_current_date', 1 );
			        		if( $enable_current_date == 1 ) :
			        	?>
					            <div class="col-md-4 col-sm-3 col-xs-12">
					                <?php
										$current_date = current_time( 'l, j M Y' );
										echo esc_html( $current_date );
									?>
					            </div>
			            <?php
			            	endif;

			            	$enable_top_menu = get_theme_mod( 'magazine_o_show_top_menu', 1 );
			        		if( $enable_top_menu == 1 ) :
			            ?>
					            <div class="col-md-4 col-sm-6 col-xs-12">
					            	<?php
					            		if( has_nav_menu( 'top_menu' ) ) :
					            			wp_nav_menu( array(
					            				'theme_location' => 'top_menu',
					            				'menu_class' => 'hdr-infobar-links'
					            			) );
					            		endif;?>
					            </div>
			            <?php
			            	endif;

			            	$enable_social_icons = get_theme_mod( 'magazine_o_show_social_icons', 1 );
			        		if( $enable_social_icons == 1 ) :
			            ?>
					            <div class="col-md-4 col-sm-3 col-xs-12">
					                <ul class="social topbar-social">
					                	<?php
					                		$facebook_link = get_theme_mod( 'magazine_o_facebook_link', '' );
					                		if( $facebook_link ) :
					                	?>
					                    <li><a href="<?php echo esc_attr( esc_url( $facebook_link ) ); ?>"><i class="fa fa-facebook"></i></a></li>
					                    <?php
					                    	endif;
					                    	$twitter_link = get_theme_mod( 'magazine_o_twitter_link', '' );
					                    	if( $twitter_link ) :
					                    ?>
					                    <li><a href="<?php echo esc_attr( esc_url( $twitter_link ) ); ?>"><i class="fa fa-twitter"></i></a></li>
					                    <?php
					                    	endif;
					                    	$rss_link = get_theme_mod( 'magazine_o_rss_link', '' );
					                    	if( $rss_link ) :
					                    ?>
					                    <li><a href="<?php echo esc_attr( esc_url( $rss_link ) ); ?>"><i class="fa fa-feed"></i></a></li>
					                    <?php
					                    	endif;
					                    	$linkedin_link = get_theme_mod( 'magazine_o_linkedin_link', '' );
					                    	if( $linkedin_link ) :
					                    ?>
					                    <li><a href="<?php echo esc_attr( esc_url( $linkedin_link ) ); ?>"><i class="fa fa-linkedin"></i></a></li>
					                    <?php
					                    	endif;
					                    	$googleplus_link = get_theme_mod( 'magazine_o_googleplus_link', '' );
					                    	if( $googleplus_link ) :
					                    ?>
					                    <li><a href="<?php echo esc_attr( esc_url( $googleplus_link ) ); ?>"><i class="fa fa-google-plus"></i></a></li>
					                    <?php
					                    	endif;
					                    	$youtube_link = get_theme_mod( 'magazine_o_youtube_link', '' );
					                    	if( $youtube_link ) :
					                    ?>
					                    <li><a href="<?php echo esc_attr( esc_url( $youtube_link ) ); ?>"><i class="fa fa-youtube"></i></a></li>
					                    <?php
					                    	endif;
					                    ?>
					                </ul>
					            </div>
			            <?php
			            	endif;
			            ?>
			        </div>
			    </div>
			</div>
			<!--/header infobar-->
	<?php
		endif;
	?>

	<!--header-->
	<div class="hdr" style="background-image: url( <?php if( has_header_image() ) { header_image();  } ?> ); background-size: cover;">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-4 col-xs-12">
	                <div id="logo">
				<?php
					if( has_custom_logo() ) :
						the_custom_logo();
					else :
				?>
				<a class="navbar-brand navbar-brand-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<h1 class="site-title"><em><?php bloginfo( 'name' ); ?></em></h1>
					<h5 class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h5>
				</a>

	                    <?php
	                       	endif;
	                    ?>

			</div>
	            </div>
	            <?php
	            	if( is_active_sidebar( 'sidebar-5' ) ) :
	            ?>
	            <div class="col-sm-8 col-xs-12">
	               	<div class="ads-780x90 hdr-ads-780x90">
	                    <?php
	                    	dynamic_sidebar( 'sidebar-5' );
	                    ?>
					</div>

	            </div>
	            <?php
	            	endif;
	            ?>
	        </div>
	    </div>
	    <!--header nav-->
	    <div class="hdr-nav">
	        <div class="container">
	            <div class="row">
		            <div class="col-sm-12 col-xs-12">

		                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		                  <span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'magazine-o' ); ?></span>
		                  <span class="icon-bar"></span>
		                  <span class="icon-bar"></span>
		                  <span class="icon-bar"></span>
		                </button>

				<!--navbar-->
		                <?php
						if( has_nav_menu( 'primary_menu' ) ) :
					        wp_nav_menu( array(
					            'theme_location'    => 'primary_menu',
					            'depth'             => 3,
					            'container'         => 'div',
					            'container_class'   => 'collapse navbar-collapse',
					            'container_id'      => 'bs-example-navbar-collapse-1',
					            'menu_class'        => 'nav navbar-nav',
					            'fallback_cb'       => 'Magazine_O_Bootstrap_Navwalker::fallback',
					            'walker'            => new Magazine_O_Bootstrap_Navwalker())
					        );
					        else : ?>
					        		<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                            			<ul id="menu-primary-1" class="nav navbar-nav">
                                			<li class="menu-item active">
                               					 <a href="<?php echo admin_url( 'nav-menus.php' ); ?> "> <?php esc_html_e('Add a menu','magazine-o'); ?></a>
                            				</li>
                        				</ul>
                        			</div>
						    <?php  endif; ?>
				    <!--/navbar-->

		                    <!--search div-->
		                    <div class="hdr-search">
		                        <!-- Button trigger modal -->
		                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default navbar-btn">
		                            <i class="fa fa-search" aria-hidden="true"></i>
		                        </button>
		                        <!-- Modal -->
		                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
		                          <div class="modal-dialog" role="document">
		                            <div class="modal-content">
		                              <div class="modal-header">
		                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><?php esc_html_e('x','magazine-o'); ?></span></button>
		                              </div>
		                              <div class="modal-body">

		                                <h1><?php esc_html_e('Search','magazine-o'); ?></h1>
		                                <form class="navbar-form " role="search">
		                                  <div class="form-group">
		                                    <input class="form-control" placeholder="Search" type="text">
		                                  </div>
		                                  <button type="submit" class="btn btn-default"><?php esc_html_e('Submit','magazine-o'); ?></button>
		                                </form>

		                              </div>

		                            </div>
		                          </div>
		                        </div>
		                    </div>
		                    <!--/search div-->

		            </div>
	        	</div>
	        </div>
	    </div>
	    <!--header nav-->
	</div>
	<!--/header-->
