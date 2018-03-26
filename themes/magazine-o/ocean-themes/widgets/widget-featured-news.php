<?php
/**
 * Widget - Featured News
 *
 * @package Magazine_O
 */

if( ! class_exists( 'Magazine_O_Featured_Posts' ) ) :
	/**
	 * Featured Posts
	 *
	 * @since 1.0.0
	 */
	class Magazine_O_Featured_Posts extends WP_Widget
	{
		
		function __construct()
		{
			$opts = array(
				'description'	=> esc_html__( 'Displays four distinct featured posts. Place it in "Featured Posts Widget Area" widget area.', 'magazine-o' )
			);
			parent::__construct( 'magazine-o-featured-post', esc_html__( 'MX: Featured Posts', 'magazine-o' ), $opts );
		}

		function widget( $args, $instance ) {
			$cat_1 = ! empty( $instance[ 'cat_1' ] ) ? $instance[ 'cat_1' ] : 1;
			$cat_2 = ! empty( $instance[ 'cat_2' ] ) ? $instance[ 'cat_2' ] : 2;
			$cat_3 = ! empty( $instance[ 'cat_3' ] ) ? $instance[ 'cat_3' ] : 3;
			$cat_4 = ! empty( $instance[ 'cat_4' ] ) ? $instance[ 'cat_4' ] : 4;
			?>
			<div class="slider grid-slider-a">
			    <div class="container">
			        <div class="row no-gutters">
			        	<?php
			        		if( $cat_1 ) :
			        			$feat_arg_1 = array(
			        				'post_type' => 'post',
			        				'posts_per_page' => 1,
			        				'cat' => absint( $cat_1 ),
			        				'ignore_sticky_posts' => 1,
			        			);

			        			$feat_query_1 = new WP_Query( $feat_arg_1 );
			        			if( $feat_query_1->have_posts() ) :
			        	?>
						            <div class="col-md-6 col-sm-12">
						            	<?php
						            		while( $feat_query_1->have_posts() ) :
						            			$feat_query_1->the_post();
						            			if( has_post_thumbnail() ) :
						            	?>
									                <div class="gsa-item gsa-item-h-full">
									                    <a href="<?php the_permalink(); ?>">
									                        <span class="thumbnail gsa-item-h-full-thumbnail">
									                        	<?php the_post_thumbnail( 'magazine-o-thumbnail-1', array( 'class' => 'img-responsive' ) ); ?>
									                        </span>
									                    </a>
									                    <div class="overlay">
									                        <a class="cat-label" href="<?php echo esc_url( get_category_link( $cat_1 ) ); ?>">
									                        	<?php
									                        		echo get_cat_name( $cat_1 );
									                        	?>
									                        </a>
									                        <a href="<?php the_permalink(); ?>">
									                        	<h2 class="featured-post-title"><?php the_title(); ?></h2>
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
						                <?php
						                		endif;
						                	endwhile;
						                	wp_reset_postdata();
						                ?>
						            </div>
			            <?php
			            		endif;
			            	endif;
			            ?>
			            <div class="col-md-6 col-sm-12">
			            	<?php
			            		if( $cat_2 ) :
			            			$feat_arg_2 = array(
				        				'post_type' => 'post',
				        				'posts_per_page' => 1,
				        				'cat' => absint( $cat_2 ),
				        				'ignore_sticky_posts' => 1,
				        			);

				        			$feat_query_2 = new WP_Query( $feat_arg_2 );
				        			if( $feat_query_2->have_posts() ) :
				        				while( $feat_query_2->have_posts() ) :
				        					$feat_query_2->the_post();
				        					if( has_post_thumbnail() ) :
			            	?>
								                <div class="gsa-item gsa-item-h-half">
								                    <a href="<?php the_permalink(); ?>">
										                <span class="thumbnail gsa-item-h-half-thumbnail">
										                    <?php the_post_thumbnail( 'magazine-o-thumbnail-2', array( 'class' => 'img-responsive' ) ); ?>
										                </span>
										            </a>
										            <div class="overlay">
										                <a class="cat-label" href="<?php echo esc_url( get_category_link( $cat_2 ) ); ?>">
										                    <?php
										                        echo get_cat_name( $cat_2 );
										                    ?>
										                </a>
										                <a href="<?php the_permalink(); ?>">
										                    <h2 class="featured-post-title"><?php the_title(); ?></h2>
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
			                <?php
				                			endif;
				                		endwhile;
				                		wp_reset_postdata();
				                	endif;
				                endif;
			                ?>
			                <div class="grid-item-h-half">
			                	<?php
				            		if( $cat_3 ) :
				            			$feat_arg_3 = array(
					        				'post_type' => 'post',
					        				'posts_per_page' => 1,
					        				'cat' => absint( $cat_3 ),
					        				'ignore_sticky_posts' => 1,
					        			);

					        			$feat_query_3 = new WP_Query( $feat_arg_3 );
					        			if( $feat_query_3->have_posts() ) :
					        				while( $feat_query_3->have_posts() ) :
					        					$feat_query_3->the_post();
					        					if( has_post_thumbnail() ) :
				            	?>
								                    <div class="gsa-item gsa-item-hv-half">
								                        <a href="<?php the_permalink(); ?>">
											                <span class="thumbnail gsa-item-hv-half-thumbnail">
											                    <?php the_post_thumbnail( 'magazine-o-thumbnail-3', array( 'class' => 'img-responsive' ) ); ?>
											                </span>
											            </a>
											            <div class="overlay">
											                <a class="cat-label" href="<?php echo esc_url( get_category_link( $cat_3 ) ); ?>">
											                    <?php
											                        echo get_cat_name( $cat_3 );
											                    ?>
											                </a>
											                <a href="<?php the_permalink(); ?>">
											                    <h5 class="featured-post-title"><?php the_title(); ?></h5>
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
								<?php
												endif;
											endwhile;
											wp_reset_postdata();
										endif;
									endif;

									if( $cat_4 ) :
				            			$feat_arg_4 = array(
					        				'post_type' => 'post',
					        				'posts_per_page' => 1,
					        				'cat' => absint( $cat_4 ),
					        				'ignore_sticky_posts' => 1,
					        			);

					        			$feat_query_4 = new WP_Query( $feat_arg_4 );
					        			if( $feat_query_4->have_posts() ) :
					        				while( $feat_query_4->have_posts() ) :
					        					$feat_query_4->the_post();
					        					if( has_post_thumbnail() ) :
								?>
				                    				<div class="gsa-item gsa-item-hv-half">
								                        <a href="<?php the_permalink(); ?>">
											                <span class="thumbnail gsa-item-hv-half-thumbnail">
											                    <?php the_post_thumbnail( 'magazine-o-thumbnail-3', array( 'class' => 'img-responsive' ) ); ?>
											                </span>
											            </a>
											            <div class="overlay">
											                <a class="cat-label" href="<?php echo esc_url( get_category_link( $cat_4 ) ); ?>">
											                    <?php
											                        echo get_cat_name( $cat_4 );
											                    ?>
											                </a>
											                <a href="<?php the_permalink(); ?>">
											                    <h5 class="featured-post-title"><?php the_title(); ?></h5>
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
							    <?php
												endif;
											endwhile;
											wp_reset_postdata();
										endif;
									endif;
								?>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'cat_1' ] = absint( $new_instance[ 'cat_1' ] );
			$instance[ 'cat_2' ] = absint( $new_instance[ 'cat_2' ] );
			$instance[ 'cat_3' ] = absint( $new_instance[ 'cat_3' ] );
			$instance[ 'cat_4' ] = absint( $new_instance[ 'cat_4' ] );

			return $instance;
		}

		function form( $instance ) {
			$cat_1 = ! empty( $instance[ 'cat_1' ] ) ? $instance[ 'cat_1' ] : 0;
			$cat_2 = ! empty( $instance[ 'cat_2' ] ) ? $instance[ 'cat_2' ] : 0;
			$cat_3 = ! empty( $instance[ 'cat_3' ] ) ? $instance[ 'cat_3' ] : 0;
			$cat_4 = ! empty( $instance[ 'cat_4' ] ) ? $instance[ 'cat_4' ] : 0;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_1' ) )?>"><strong><?php echo esc_html__( 'Featured Post - Left:', 'magazine-o' ); ?></strong></label>
				<br>
				<?php
					$cat_args_1 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_1' ),
						'name'	=> $this->get_field_name( 'cat_1' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_1 ),
						'show_option_all'	=> esc_html__( 'Show Recent Post', 'magazine-o' )
					);
					wp_dropdown_categories( $cat_args_1 );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_2' ) )?>"><strong><?php echo esc_html__( 'Featured Post - Right Top:', 'magazine-o' ); ?></strong></label>
				<?php
					$cat_args_2 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_2' ),
						'name'	=> $this->get_field_name( 'cat_2' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_2 ),
						'show_option_all'	=> esc_html__( 'Show Recent Post', 'magazine-o' )
					);
					wp_dropdown_categories( $cat_args_2 );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_3' ) )?>"><strong><?php echo esc_html__( 'Featured Post - Right Bottom Left:', 'magazine-o' ); ?></strong></label>
				<br>
				<?php
					$cat_args_3 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_3' ),
						'name'	=> $this->get_field_name( 'cat_3' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_3 ),
						'show_option_all'	=> esc_html__( 'Show Recent Post', 'magazine-o' )
					);
					wp_dropdown_categories( $cat_args_3 );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_4' ) )?>"><strong><?php echo esc_html__( 'Featured Post - Right Bottom Right', 'magazine-o' ); ?></strong></label>
				<br>
				<?php
					$cat_args_4 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_4' ),
						'name'	=> $this->get_field_name( 'cat_4' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_4 ),
						'show_option_all'	=> esc_html__( 'Show Recent Post', 'magazine-o' )
					);
					wp_dropdown_categories( $cat_args_4 );
				?>
			</p>
			<?php
		}
	}
endif;
