<?php
/**
 * Testimonials Widgets
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array $education_base_post_number
 *
 */
if ( !function_exists('education_base_post_number') ) :
    function education_base_post_number() {
        $education_base_post_number =  array(
            1 => __( '1', 'education-base' ),
            2 => __( '2', 'education-base' ),
            3 => __( '3', 'education-base' ),
            4 =>  __( '4', 'education-base' )
        );
        return apply_filters( 'education_base_post_number', $education_base_post_number );
    }
endif;


/**
 * Class for adding Testimonial Section Widget
 *
 * @package Acme Themes
 * @subpackage Education Base
 * @since 1.0.0
 */
if ( ! class_exists( 'Education_base_testimonial' ) ) {

    class Education_base_testimonial extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'unique_id'     => '',
            'bg_image'     => '',
            'title'         => '',
            'page_id'       => '',
            'post_number' => 3,
            'column_number' => 3
        );

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'education_base_testimonial',
                /*Widget name will appear in UI*/
                __('AT Testimonial Section', 'education-base'),
                /*Widget description*/
                array( 'description' => __( 'Show Testimonial Section.', 'education-base' ), )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, $this->defaults );
            /*default values*/
            $unique_id = esc_attr( $instance[ 'unique_id' ] );
            $bg_image = esc_url( $instance[ 'bg_image' ] );
            $title = esc_attr( $instance[ 'title' ] );
            $page_id = absint( $instance[ 'page_id' ] );
            $post_number = absint( $instance[ 'post_number' ] );
            $column_number = absint( $instance[ 'column_number' ] );
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'unique_id' ); ?>"><?php _e( 'Section ID', 'education-base' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'unique_id' ); ?>" name="<?php echo $this->get_field_name( 'unique_id' ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php _e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','education-base')?></small>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('bg_image'); ?>">
                    <?php _e( 'Select Background Image', 'education-base' ); ?>:
                </label>
                <?php
                $education_base_display_none = '';
                if ( empty( $bg_image ) ){
                    $education_base_display_none = ' style="display:none;" ';
                }
                ?>
                <span class="img-preview-wrap" <?php echo  $education_base_display_none ; ?>>
                    <img class="widefat" src="<?php echo esc_url( $bg_image ); ?>" alt="<?php _e( 'Image preview', 'education-base' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('bg_image'); ?>" id="<?php echo $this->get_field_id('bg_image'); ?>" value="<?php echo esc_url( $bg_image ); ?>" />
                <input type="button" value="<?php _e( 'Upload Image', 'education-base' ); ?>" class="button media-image-upload" data-title="<?php _e( 'Select Background Image','education-base'); ?>" data-button="<?php _e( 'Select Background Image','education-base'); ?>"/>
                <input type="button" value="<?php _e( 'Remove Image', 'education-base' ); ?>" class="button media-image-remove" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'education-base' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Select Page For Testimonial', 'education-base' ); ?>:</label>
                <br />
                <small><?php _e( 'Select parent page and its subpages will display in the frontend. If page does not have any subpages, then selected single page will display', 'education-base' ); ?></small>
                <?php
                /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
                $args = array(
                    'selected'              => $page_id,
                    'name'                  => $this->get_field_name( 'page_id' ),
                    'id'                    => $this->get_field_id( 'page_id' ),
                    'class'                 => 'widefat',
                    'show_option_none'      => __('Select Page','education-base'),
                );
                wp_dropdown_pages( $args );
                ?>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e( 'Post Number', 'education-base' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="number" value="<?php echo $post_number; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'column_number' ); ?>"><?php _e( 'Column Number', 'education-base' ); ?>:</label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'column_number' ); ?>" name="<?php echo $this->get_field_name( 'column_number' ); ?>" >
                    <?php
                    $education_base_team_column_numbers = education_base_team_column_number();
                    foreach ( $education_base_team_column_numbers as $key => $value ){
                        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value );?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <?php
        }
        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'unique_id' ] = sanitize_key( $new_instance[ 'unique_id' ] );
            $instance['bg_image'] = ( isset( $new_instance['bg_image'] ) ) ?  esc_url_raw( $new_instance['bg_image'] ): '';
            $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );

            $instance[ 'page_id' ] = absint( $new_instance[ 'page_id' ] );
            $instance[ 'post_number' ] = absint( $new_instance[ 'post_number' ] );
            $instance[ 'column_number' ] = absint( $new_instance[ 'column_number' ] );

            return $instance;
        }
        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return array
         *
         */
        public function widget($args, $instance) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);

            /*default values*/
            $unique_id = !empty( $instance[ 'unique_id' ] ) ? esc_attr( $instance[ 'unique_id' ] ) : esc_attr( $this->id );
            $bg_image = esc_url( $instance['bg_image'] );
            $title = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
            $page_id = absint( $instance[ 'page_id' ] );
            $post_number = absint( $instance[ 'post_number' ] );
            $column_number = absint( $instance[ 'column_number' ] );

            echo $args['before_widget'];
            $bg_image_style = '';
            $bg_image_class = '';
            if ( !empty( $bg_image ) ) {
                $bg_image_style .= 'background-image:url(' . $bg_image . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position: center;';
                $bg_image_class = 'at-parallax';
            }
            else{
                $bg_image_class = 'at-no-parallax';
            }
            ?>
            <section id="<?php echo esc_attr( $unique_id );?>" class="acme-widgets acme-testimonials <?php echo $bg_image_class; ?>" style="<?php echo $bg_image_style; ?>">
                <div class="container">
                    <div class="main-title init-animate slideInUp1">
                        <?php
                        if( !empty( $title ) ) {
                            echo $args['before_title'] .esc_html( $title ).$args['after_title'];
                        }
                        ?>
                    </div>
                    <div class="row">
                        <?php if( !empty ( $page_id ) ) :
                            $education_base_child_page_args = array(
                                'post_parent'         => $page_id,
                                'posts_per_page'      => $post_number,
                                'post_type'           => 'page',
                                'no_found_rows'       => true,
                                'post_status'         => 'publish'
                            );
                            $testimonial_query = new WP_Query( $education_base_child_page_args );
                            
                            if ( !$testimonial_query->have_posts() ){
                                $education_base_child_page_args = array(
                                    'page_id'         => $page_id,
                                    'posts_per_page'      => 1,
                                    'post_type'           => 'page',
                                    'no_found_rows'       => true,
                                    'post_status'         => 'publish'
                                );
                                $testimonial_query = new WP_Query( $education_base_child_page_args );
                                $column_number = 1;
                            }
                            
                            /*The Loop*/
                            if ( $testimonial_query->have_posts() ):
                                $i = 1;
                                while( $testimonial_query->have_posts() ):$testimonial_query->the_post();
                                    $animation1 = "init-animate slideInUp1";

                                    if( 1 == $column_number ){
                                        $b_col = " col-sm-12";
                                    }
                                    elseif( 2 == $column_number ){
                                        $b_col = " col-sm-6";
                                    }
                                    elseif( 3 == $column_number ){
                                        $b_col = " col-sm-12 col-md-4";
                                    }
                                    else{
                                        $b_col = " col-sm-12 col-md-3";
                                    }
                                    ?>
                                    <div class="<?php echo esc_attr( $b_col ); ?>">
                                        <div class="testimonial-item <?php echo esc_attr( $animation1 );?>">
                                            <div class="testimonial-content">
                                                <div class="testimonial-author">
                                                    <div class="row">
                                                        <?php
                                                        if( has_post_thumbnail( ) ){
                                                            ?>
                                                            <div class="testimonial-image col-md-4 text-left">
                                                                <?php the_post_thumbnail('thumbnail'); ?>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php the_title( sprintf( '<h3 class="testimonial-author-name col-md-8"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                                    </div>
                                                </div>
                                                <?php the_excerpt();?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if( 0 == $i % $column_number ){
                                        echo "<div class='clearfix'></div>";
                                    }
                                    $i++;
                                endwhile;
                            endif;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
            <?php
            echo $args['after_widget'];
        }
    } // Class Education_base_testimonial ends here
}

/**
 * Function to Register and load the widget
 *
 * @since 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_testimonial' ) ) :

    function education_base_testimonial() {
        register_widget( 'Education_base_testimonial' );
    }
endif;
add_action( 'widgets_init', 'education_base_testimonial' );