<?php
/**
 * Widget - News Block Layouts
 *
 * @package Magazine_O
 */

/*-----------------------------------------------------
		Sidebar Widgets
-----------------------------------------------------*/

if ( ! class_exists( 'Magazine_O_Post_Widget_One' ) ) :
	/**
	* Sidebar Post Widget One
	*/
	class Magazine_O_Post_Widget_One extends WP_Widget
	{
		
		function __construct()
		{
			$opts = array(
				'description'	=> esc_html__( 'Displays posts. Place it within "Sidebar" Or "Footer"', 'magazine-o' )
			);

			parent::__construct( 'sidebar_post_widget_one', esc_html__( 'MX: Sidebar Post Widget ', 'magazine-o' ), $opts );
		}

		function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;
			
			echo $args[ 'before_widget' ];

			echo $args[ 'before_title' ];

			echo esc_html( $title ); 
			
			echo $args[ 'after_title' ];

			$arguments = array(
				'cat'	=> absint( $cat ),
				'posts_per_page' => absint( $post_no ),
			); 

			$query = new WP_Query( $arguments );

			if( $query->have_posts() ) :
			?>
				<div class="widget-content widget-post">
                    <div id="carousel7" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                            <div class="first-slider item active">
                            	<?php
                            		while( $query->have_posts() ) :
                            			$query->the_post();
                            	?>
                                <div class="col-half">
                                    <article class="post-grid post-wrap">
                                        <div class="post-header">
                                        	<?php
                                        		if( has_post_thumbnail() ) :
                                        	?>
		                                            <div class="thumbnail post-thumb">
		                                                <a href="<?php the_permalink(); ?>" class="image-link">
		                                                    <?php
												                the_post_thumbnail( 'magazine-o-thumbnail-7', array( 'class' => 'img-responsive' ) );
												            ?>
		                                                </a>
		                                            </div>
                                            <?php
                                            	endif;
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                            	<h2><?php the_title(); ?></h2>
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
                                    </article>
                                </div>
                                <?php
                                	endwhile;
                                	wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
			<?php 
			endif;
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'cat' ] = absint( $new_instance[ 'cat' ] );
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );

			return $instance;
		}

		function form( $instance ) {

			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 4;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'magazine-o' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'magazine-o' ); ?></strong></label>
				<?php
					$cat_args = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat' ),
						'name'	=> $this->get_field_name( 'cat' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat ),
						'show_option_all'	=> esc_html__( 'Show Recent Posts', 'magazine-o' )
					);
					wp_dropdown_categories( $cat_args );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'magazine-o' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>
			<?php			
		}
	}
endif;

if ( ! class_exists( 'Magazine_O_Post_Widget_Two' ) ) :
	/**
	* Sidebar Post Widget Two
	*/
	class Magazine_O_Post_Widget_Two extends WP_Widget
	{
		
		function __construct()
		{
			$opts = array(
				'description'	=> esc_html__( 'Displays posts. Place it within "Sidebar" Or "Footer"', 'magazine-o' )
			);

			parent::__construct( 'sidebar_post_widget_two', esc_html__( 'MX: Sidebar Post Widget 2', 'magazine-o' ), $opts );
		}

		function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;
			
			echo $args[ 'before_widget' ];

			echo $args[ 'before_title' ];

			echo esc_html( $title ); 
			
			echo $args[ 'after_title' ];

			$arguments = array(
				'cat'	=> absint( $cat ),
				'posts_per_page' => absint( $post_no ),
			); 

			$query = new WP_Query( $arguments );

			if( $query->have_posts() ) :
			?>
				<div class="block-main-container">
                    <div id="carousel8" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                            <div class="first-slider row item active">
                                <div class="col-sm-12 col-xs-12">
                                	<?php
                                		$count = 0;
                                		while( $query->have_posts() ) :
                                			$query->the_post();
                                			if( $count == 0 ) :
                                	?>
			                                    <article class="post-grid post-wrap">
			                                        <div class="post-header">
			                                            <?php
			                                        		if( has_post_thumbnail() ) :
			                                        	?>
					                                            <div class="thumbnail post-thumb">
					                                                <a href="<?php the_permalink(); ?>" class="image-link">
					                                                    <?php
															                the_post_thumbnail( 'magazine-o-thumbnail-4', array( 'class' => 'img-responsive' ) );
															            ?>
					                                                </a>
					                                            </div>
			                                            <?php
			                                            	endif;
			                                            ?>
			                                            <a href="<?php the_permalink(); ?>">
			                                            	<h2><?php the_title(); ?></h2>
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
			                                            <?php the_excerpt(); ?>
			                                        </div>
			                                    </article>
                                    <?php
                                    		endif;
                                    		$count = $count + 1;
	                                    endwhile;
	                                    wp_reset_postdata();
                                    ?>
                                    <div class="post-list">
                                    	<?php
                                    		$count = 0;
                                    		while( $query->have_posts() ) :
                                    			$query->the_post();
                                    			if( $count != 0 ) :
                                    	?>
			                                        <article class="small-post post-wrap">
			                                            <div class="post-header">
		                                                	<?php
				                                        		if( has_post_thumbnail() ) :
				                                        	?>
						                                            <div class="thumbnail post-thumb">
						                                                <a href="<?php the_permalink(); ?>" class="image-link">
						                                                    <?php
																                the_post_thumbnail( 'magazine-o-thumbnail-4', array( 'class' => 'img-responsive' ) );
																            ?>
						                                                </a>
						                                            </div>
				                                            <?php
				                                            	endif;
				                                            ?>
			                                                <a href="<?php the_permalink(); ?>">
			                                                	<h2><?php the_title(); ?></h2>
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
			                                        </article>
                                        <?php
                                        		endif;
                                        		$count = $count + 1;
                                        	endwhile;
                                        	wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               	</div>
			<?php 
			endif;
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'cat' ] = absint( $new_instance[ 'cat' ] );
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );

			return $instance;
		}

		function form( $instance ) {

			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 4;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'magazine-o' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'magazine-o' ); ?></strong></label>
				<?php
					$cat_args = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat' ),
						'name'	=> $this->get_field_name( 'cat' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat ),
						'show_option_all'	=> esc_html__( 'Show Recent Posts', 'magazine-o' )
					);
					wp_dropdown_categories( $cat_args );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'magazine-o' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>
			<?php			
		}
	}
endif;

if ( ! class_exists( 'Magazine_O_Post_Widget_Three' ) ) :
	/**
	* Sidebar Post Widget Three
	*/
	class Magazine_O_Post_Widget_Three extends WP_Widget
	{
		
		function __construct()
		{
			$opts = array(
				'description'	=> esc_html__( 'Displays posts. Place it within "Sidebar" Or "Footer"', 'magazine-o' )
			);

			parent::__construct( 'sidebar_post_widget_three', esc_html__( 'MX: Sidebar Post Widget 3', 'magazine-o' ), $opts );
		}

		function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;
			
			echo $args[ 'before_widget' ];

			echo $args[ 'before_title' ];

			echo esc_html( $title ); 
			
			echo $args[ 'after_title' ];

			$arguments = array(
				'cat'	=> absint( $cat ),
				'posts_per_page' => absint( $post_no ),
			); 

			$query = new WP_Query( $arguments );

			if( $query->have_posts() ) :
			?>
				<div class="post-list">
					<?php
						while( $query->have_posts() ) :
							$query->the_post();
					?>
		                    <article class="small-post post-wrap">
		                        <div class="post-header">
			                        <?php
			                            if( has_post_thumbnail() ) :
			                        ?>
				                        	<div class="thumbnail post-thumb">
				                                <a class="image-link" href="#">
				                                    <?php
					                                    the_post_thumbnail( 'magazine-o-thumbnail-5', array( 'class' => 'img-responsive' ) );
					                                ?>
				                                </a>
				                            </div>
		                            <?php
		                                endif;
		                            ?>
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
		                    </article>
                    <?php
                    	endwhile;
                    	wp_reset_postdata();
                    ?>
                </div>
			<?php 
			endif;
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'cat' ] = absint( $new_instance[ 'cat' ] );
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );

			return $instance;
		}

		function form( $instance ) {

			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 4;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'magazine-o' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'magazine-o' ); ?></strong></label>
				<?php
					$cat_args = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat' ),
						'name'	=> $this->get_field_name( 'cat' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat ),
						'show_option_all'	=> esc_html__( 'Show Recent Posts', 'magazine-o' )
					);
					wp_dropdown_categories( $cat_args );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'magazine-o' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>
			<?php			
		}
	}
endif;