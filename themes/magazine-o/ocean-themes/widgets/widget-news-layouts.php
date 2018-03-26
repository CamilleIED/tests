<?php
/**
 * Widget - News Block Layouts
 *
 * @package Magazine_O
 */


/*-----------------------------------------------------
		Front Page Top Widgets
-----------------------------------------------------*/

if ( ! class_exists( 'Magazine_O_News_Block_One' ) ) :
	/**
	* News Block Layout One
	*/
	class Magazine_O_News_Block_One extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'block-layout-a',
				'description'	=> esc_html__( 'News Block Layout One. Place it within "Front Page Widget Area Top"', 'magazine-o' )
			);

			parent::__construct( 'news-block-layout-one', esc_html__( 'MX: News Block Layout 1', 'magazine-o' ), $opts );
		}

		function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

			echo $args[ 'before_widget' ];
			?>
			<div class="block-title-con">
			<?php
				echo $args[ 'before_title' ];
				?>
					<?php echo esc_html( $title ); ?>
				<?php
				echo $args[ 'after_title' ];

				if( absint( $cat ) > 0 ) {
					$cat_link = get_category_link( $cat );
				} else {
					$cat_link = '';
				}
				if( $cat_link ) :
				?>
					<div class="subcat-filter">
	                    <ul class="subcat-list">
	                        <li><a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html__( 'View All', 'magazine-o' ); ?></a></li>
	                    </ul>
	                </div>
				<?php
				endif;
				?>
			</div>
			<?php
				$arguments = array(
					'cat'	=> absint( $cat ),
					'posts_per_page' => absint( $post_no ),
				);
				$query = new WP_Query( $arguments );
				if( $query->have_posts() ) :
				?>
					<div class="block-main-container">
                        <div id="carousel1" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                <div class="first-slider row">
                                	<?php
                                		$count = 0;
                                		while( $query->have_posts() ) :
                                			$query->the_post();
                                			if( $count == 0 ) :
                                	?>
			                                    <div class="col-md-6 col-md-6 col-xs-12">
			                                        <article class="post-grid post-wrap">
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
			                                                <?php
			                                                	the_excerpt();
			                                                ?>
			                                            </div>
			                                        </article>
			                                    </div>
		                            <?php
		                            		endif;
		                            		$count = $count + 1;
		                            	endwhile;
		                            	wp_reset_postdata();
		                            ?>
                                    <div class="col-md-6 col-md-6 col-xs-12">
                                        <div class="post-list">
                                        	<?php
                                        		$count = 0;
                                        		while( $query->have_posts() ) :
                                        			$query->the_post();
                                        			if( $count > 0 ) :
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
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;
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

if ( ! class_exists( 'Magazine_O_News_Block_Two' ) ) :
    /**
    * News Block Layout Two
    */
    class Magazine_O_News_Block_Two extends WP_Widget
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'block-layout-b',
                'description'   => esc_html__( 'News Block Layout Two. Place it within "Front Page Widget Area Top"', 'magazine-o' )
            );

            parent::__construct( 'news-block-layout-two', esc_html__( 'MX: News Block Layout 2', 'magazine-o' ), $opts );
        }

        function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
            $cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
            $post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 6;

            echo $args[ 'before_widget' ];
            ?>
            <div class="block-title-con">
            <?php
                echo $args[ 'before_title' ];
                ?>
                    <?php echo esc_html( $title ); ?>
                <?php
                echo $args[ 'after_title' ];

                if( absint( $cat ) > 0 ) {
                    $cat_link = get_category_link( $cat );
                } else {
                    $cat_link = '';
                }
                if( $cat_link ) :
                ?>
                    <div class="subcat-filter">
                        <ul class="subcat-list">
                            <li><a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html__( 'View All', 'magazine-o' ); ?></a></li>
                        </ul>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <?php
                $arguments = array(
                    'cat'   => absint( $cat ),
                    'posts_per_page' => absint( $post_no ),
                );
                $query = new WP_Query( $arguments );
                if( $query->have_posts() ) :
                ?>
                    <div class="block-main-container">
                        <div id="carousel2" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                <div class="first-slider row">
                                    <div class="col-md-6 col-md-6 col-xs-12">
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
                                            $count = 0;
                                            wp_reset_postdata();
                                        ?>
                                        <div class="post-list">
                                            <?php
                                                while( $query->have_posts() ) :
                                                    $query->the_post();
                                                    if( $count > 0 && $count < 3 ) :
                                            ?>
                                                        <article class="small-post post-wrap">
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
                                                    endif;
                                                    $count = $count + 1;
                                                endwhile;
                                                $count = 0;
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-6 col-xs-12">
                                        <?php
                                            $count = 0;
                                            while( $query->have_posts() ) :
                                                $query->the_post();
                                                if( $count == 3 ) :
                                        ?>
                                                    <article class="post-grid post-wrap">
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
                                            $count = 0;
                                            wp_reset_postdata();
                                        ?>
                                        <div class="post-list">
                                            <?php
                                                while( $query->have_posts() ) :
                                                    $query->the_post();
                                                    if( $count > 3 ) :
                                            ?>
                                                        <article class="small-post post-wrap">
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
                                                    endif;
                                                    $count = $count + 1;
                                                endwhile;
                                                $count = 0;
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
            $post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 6;
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'magazine-o' ); ?></strong></label>
                <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'magazine-o' ); ?></strong></label>
                <?php
                    $cat_args = array(
                        'orderby'   => 'name',
                        'hide_empty'    => 0,
                        'id'    => $this->get_field_id( 'cat' ),
                        'name'  => $this->get_field_name( 'cat' ),
                        'class' => 'widefat',
                        'taxonomy'  => 'category',
                        'selected'  => absint( $cat ),
                        'show_option_all'   => esc_html__( 'Show Recent Posts', 'magazine-o' )
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

if ( ! class_exists( 'Magazine_O_News_Block_Three' ) ) :
    /**
    * News Block Layout Three
    */
    class Magazine_O_News_Block_Three extends WP_Widget
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'block-layout-c',
                'description'   => esc_html__( 'News Block Layout Three. Place it within "Front Page Widget Area Top"', 'magazine-o' )
            );

            parent::__construct( 'news-block-layout-three', esc_html__( 'MX: News Block Layout 3', 'magazine-o' ), $opts );
        }

        function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
            $cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
            $post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 6;

            echo $args[ 'before_widget' ];
            ?>
            <div class="block-title-con">
            <?php
                echo $args[ 'before_title' ];
                ?>
                    <?php echo esc_html( $title ); ?>
                <?php
                echo $args[ 'after_title' ];

                if( absint( $cat ) > 0 ) {
                    $cat_link = get_category_link( $cat );
                } else {
                    $cat_link = '';
                }
                if( $cat_link ) :
                ?>
                    <div class="subcat-filter">
                        <ul class="subcat-list">
                            <li><a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html__( 'View All', 'magazine-o' ); ?></a></li>
                        </ul>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <?php
                $arguments = array(
                    'cat'   => absint( $cat ),
                    'posts_per_page' => absint( $post_no ),
                );
                $query = new WP_Query( $arguments );
                $count_post = $query->post_count;
                if( $query->have_posts() ) :
                ?>
                    <div class="block-main-container">
                        <!--carousel-->
                        <div id="carousel3" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                <!--first item-->
                                <?php
                                	$count = 0;
                                	while( $query->have_posts() ) :
                                		$query->the_post();
                                		if( ($count%3 == 0 ) || ($count == 0) ) :
                                ?>
                                			<div class="first-slider row no-gutters item <?php if( $count == 0 ) { echo esc_attr__('active', 'magazine-o'); } ?>">
                                <?php
                                		endif;
                                ?>
		                                    <div class="col-sm-4 col-xs-12">
		                                        <article class="post-grid post-wrap">
		                                            <div class="caption-inside">
		                                            	<?php
		                                            		if( has_post_thumbnail() ) :
		                                            	?>
		                                                <a href="<?php the_permalink(); ?>">
		                                                    <span class="thumbnail">
		                                                        <?php
		                                                            the_post_thumbnail( 'magazine-o-thumbnail-6', array( 'class' => 'img-responsive' ) );
		                                                        ?>
		                                                    </span>
		                                                </a>
		                                                <?php
		                                                	endif;
		                                                ?>
		                                                <div class="overlay">
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
		                                            </div>
		                                        </article>
		                                    </div>
		                                <?php
		                                	$count = $count + 1;
		                                	if( ($count%3 == 0) || ($count == $count_post) ) :
		                                ?>
                                			</div>
                                <?php
                                			endif;
                                	endwhile;
                                	wp_reset_postdata();
                                ?>
                                </div>
                            </div>
                            <!--carousel-->
                        </div>
                        <!--/block main -->

                        <div class="carousel block-carousel">
                            <a class="left carousel-control" href="#carousel3" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="right carousel-control" href="#carousel3" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
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
            $post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 6;
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'magazine-o' ); ?></strong></label>
                <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'magazine-o' ); ?></strong></label>
                <?php
                    $cat_args = array(
                        'orderby'   => 'name',
                        'hide_empty'    => 0,
                        'id'    => $this->get_field_id( 'cat' ),
                        'name'  => $this->get_field_name( 'cat' ),
                        'class' => 'widefat',
                        'taxonomy'  => 'category',
                        'selected'  => absint( $cat ),
                        'show_option_all'   => esc_html__( 'Show Recent Posts', 'magazine-o' )
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
