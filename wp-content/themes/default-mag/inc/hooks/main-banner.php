<?php
if (!function_exists('default_mag_main_banner')) :
    /**
     * Main Banner Section
     *
     * @since default-mag 1.0.0
     *
     */
    function default_mag_main_banner()
    {
        if (1 != default_mag_get_option('show_main_banner_section')) {
            return null;
        }
        ?>
        <div class="twp-banner-main-section">
            <div class="container">
                <div class="twp-row">
                        <?php 
                        $default_mag_select_category_for_exclusive_section = esc_attr(default_mag_get_option('select_category_for_exclusive_section'));
                        $default_mag_number_of_home_exclusive_section = absint(default_mag_get_option('number_of_home_exclusive_section'));
                        $default_mag_main_banner_exclusive_args = array(
                            'post_type' => 'post',
                            'cat' => absint($default_mag_select_category_for_exclusive_section),
                            'ignore_sticky_posts' => true,
                            'posts_per_page' => absint( $default_mag_number_of_home_exclusive_section ),
                        ); ?>
                        <div class="twp-col-gap col-lg-3  col-sm-12  banner-sticky-sidebar">
                            <h2 class="twp-title"><?php echo esc_html(default_mag_get_option('default_mag_banner_exclusive_section')); ?></h2>
                            <ul class="twp-exclusive-post-list twp-post-layout-1">
                                    <?php 
                                    $default_mag_main_banner_exclusive_post_query = new WP_Query($default_mag_main_banner_exclusive_args);
                                    if ($default_mag_main_banner_exclusive_post_query->have_posts()) :
                                        while ($default_mag_main_banner_exclusive_post_query->have_posts()) : $default_mag_main_banner_exclusive_post_query->the_post();
                                            if(has_post_thumbnail()){
                                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                                $url = $thumb['0'];
                                            }
                                            else{
                                                $url = '';
                                            }
                                            ?>
                                            <li class="twp-post twp-post-style-1">
                                                <div class="twp-image-section twp-image-hover-effect twp-image-70">
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                    <div class="twp-image data-bg" data-background="<?php echo esc_url($url); ?>"></div>
                                                    <?php echo esc_attr(default_mag_post_format(get_the_ID())); ?>
                                                </div>

                                                <div class="twp-desc">
                                                    <div class="twp-author-desc twp-primary-color">
                                                        <?php default_mag_post_date(); ?>
                                                    </div>
                                                    <h3 class="twp-post-title twp-line-limit-3 twp-post-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                </div>
                                            </li>
                                        <?php
                                        endwhile;
                                endif; 
                                wp_reset_postdata(); 
                                ?>
                            </ul>
                        </div><!--col-->

                        <?php 
                        $default_mag_select_category_for_banner_section = esc_attr(default_mag_get_option('select_category_for_slider_section'));
                        $default_mag_number_of_home_banner_section = absint(default_mag_get_option('number_of_home_slider'));
                        $excerpt_length = absint(default_mag_get_option('number_of_content_home_slider'));
                        $default_mag_main_banner_banner_args = array(
                            'post_type' => 'post',
                            'cat' => absint($default_mag_select_category_for_banner_section),
                            'ignore_sticky_posts' => true,
                            'posts_per_page' => absint( $default_mag_number_of_home_banner_section ),
                            'posts_per_page' => 4,
                        ); 

                        $default_mag_main_banner_banner_args_2 = array(
                            'post_type' => 'post',
                            'cat' => absint($default_mag_select_category_for_banner_section),
                            'ignore_sticky_posts' => true,
                            'posts_per_page' => absint( $default_mag_number_of_home_banner_section ),
                            'offset' => 4,
                        ); ?>
                        <div class="col-lg-5 col-sm-12 twp-col-gap banner-sticky-sidebar">
                            <div class="twp-banner-slider-section">
                                <h2 class="twp-title"><?php echo esc_html(default_mag_get_option('default_mag_banner_slider_section')); ?></h2>
                                <div class="twp-banner-article-slider">
                                    <?php 
                                    $default_mag_main_banner_banner_post_query = new WP_Query($default_mag_main_banner_banner_args);
                                    if ($default_mag_main_banner_banner_post_query->have_posts()) :
                                    while ($default_mag_main_banner_banner_post_query->have_posts()) : $default_mag_main_banner_banner_post_query->the_post();
                                        if(has_post_thumbnail()){
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                                            $url = $thumb['0'];
                                        }
                                        else{
                                            $url = '';
                                        }
                                        ?>
    
                                        <div class="twp-banner-slider-wrapper">
                                            <div class="twp-post twp-post-style-2">
                                                <div class="twp-image-section twp-image-with-content twp-image-hover-effect twp-image-300 data-bg-xl--">
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                    <div class="twp-image data-bg"  data-background="<?php echo esc_url($url); ?>">
                                                    </div>
                                                    <div class="twp-desc twp-overlay twp-w-100">
                                                        <div class="twp-categories twp-categories-with-bg">
                                                            <?php default_mag_post_categories(); ?>
                                                        </div>
                                                        <h3 class="twp-post-title"><a class="twp-default-anchor-text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                        <div class="twp-author-desc">
                                                            <?php default_mag_post_author(); ?>
                                                            <?php default_mag_post_date(); ?>
                                                            <?php default_mag_get_comments_count(get_the_ID()); ?>
                                                        </div>
                                                        <?php echo esc_attr(default_mag_post_format(get_the_ID())); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    endif; 
                                    wp_reset_postdata(); ?>
                                </div>
    
                                <div class="twp-post-list">
                                    <div class="twp-row">
                                        <?php 
                                        $default_mag_main_banner_banner_post_query_2 = new WP_Query($default_mag_main_banner_banner_args_2);
                                        if ($default_mag_main_banner_banner_post_query_2->have_posts()) :
                                        while ($default_mag_main_banner_banner_post_query_2->have_posts()) : $default_mag_main_banner_banner_post_query_2->the_post();
                                            if(has_post_thumbnail()){
                                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                                $url = $thumb['0'];
                                            }
                                            else{
                                                $url = '';
                                            }
                                            ?>
                                                <div class="twp-col-gap col-sm-6">
                                                    <div class="twp-post twp-post-style-3">
                                                        <div class="twp-image-section twp-image-hover-effect twp-image-150">
                                                            <a href="<?php the_permalink(); ?>"></a>
                                                            <div class="twp-image data-bg" data-background="<?php echo esc_url($url); ?>"></div>
                                                            <?php echo esc_attr(default_mag_post_format(get_the_ID())); ?>
                                                        </div>
                                                        <div class="twp-desc">
                                                            <div class="twp-categories twp-primary-categories">
                                                                <?php default_mag_post_categories(); ?>
                                                            </div>
                                                            <h3 class="twp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <div class="twp-author-desc">
                                                                <?php default_mag_post_date(); ?>
                                                            </div>
                                                            <?php if (absint($excerpt_length) > 0) : ?>
                                                                <?php
                                                                $excerpt = default_mag_get_excerpt($excerpt_length, get_the_content());
                                                                echo wp_kses_post(wpautop($excerpt));
                                                                ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <?php 
                                            endwhile;
                                        endif; 
                                        wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div><!--col-->

                        <?php 
                        $default_mag_select_category_for_recent_section = esc_attr(default_mag_get_option('select_category_for_recent_post'));
                        $default_mag_number_of_home_recent_section = absint(default_mag_get_option('number_of_home_recent_post'));
                        $excerpt_length = absint(default_mag_get_option('number_of_content_home_slider'));
                        $default_mag_main_banner_recent_args = array(
                            'post_type' => 'post',
                            'cat' => absint($default_mag_select_category_for_recent_section),
                            'ignore_sticky_posts' => true,
                            'posts_per_page' => absint( $default_mag_number_of_home_recent_section ),
                        ); ?>
                        <div class="col-lg-4 col-sm-12 twp-col-gap banner-sticky-sidebar">
                            <h2 class="twp-title"><?php echo esc_html(default_mag_get_option('default_mag_recent_post_section')); ?></h2>
                            <ul class="twp-recent-post-list twp-post-layout-2">
                                <?php 
                                $default_mag_main_banner_recent_post_query = new WP_Query($default_mag_main_banner_recent_args);
                                $counter = 0;
                                if ($default_mag_main_banner_recent_post_query->have_posts()) :
                                    while ($default_mag_main_banner_recent_post_query->have_posts()) : $default_mag_main_banner_recent_post_query->the_post();
                                        if(has_post_thumbnail()){
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                            $url = $thumb['0'];
                                        }
                                        else{
                                            $url = '';
                                        }
                                        ?>
                                        <?php
                                        if ($counter == 0) { ?>
                                            <?php 
                                            if(has_post_thumbnail()){
                                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                                                $url = $thumb['0'];
                                            }
                                            else{
                                                $url = '';
                                            }?>
                                            <li class="twp-post twp-post-style-3 twp-block-post">
                                                <div class="twp-image-section twp-image-hover-effect twp-image-220">
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                    <div class="twp-image data-bg" data-background="<?php echo esc_url($url); ?>"></div>
                                                    <?php echo esc_attr(default_mag_post_format(get_the_ID())); ?>
                                                </div>
                                                <div class="twp-desc">
                                                    <div class="twp-categories twp-primary-categories">
                                                        <?php default_mag_post_categories(); ?>
                                                    </div>
                                                    <h3 class="twp-post-title twp-line-limit-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <div class="twp-author-desc">
                                                        <?php default_mag_post_author(); ?>
                                                        <?php default_mag_post_date(); ?>
                                                        <?php default_mag_get_comments_count(get_the_ID()); ?>
                                                    </div>
                                                    <?php if (absint($excerpt_length) > 0) : ?>
                                                        <?php
                                                        $excerpt = default_mag_get_excerpt($excerpt_length, get_the_content());
                                                        echo wp_kses_post(wpautop($excerpt));
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                        </li>
                                        <?php $counter++; } else { ?>
                                                <li class="twp-post twp-post twp-post-style-4 twp-post-with-border">
                                                    <div class="twp-unit">
                                                    <?php echo esc_html($counter); ?>
                                                    </div>
                                                    <div class="twp-desc">
                                                        <h3 class="twp-post-title twp-line-limit-3 twp-post-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                        <div class="twp-author-desc twp-primary-color">
                                                            <?php default_mag_post_date(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="twp-image-section twp-image-hover-effect twp-image-70">
                                                        <a href="<?php the_permalink(); ?>"></a>
                                                        <div  class="twp-image data-bg" data-background="<?php echo esc_url($url); ?>"></div>
                                                        <?php echo esc_attr(default_mag_post_format(get_the_ID())); ?>
                                                    </div>
                                                </li>
                                        <?php
                                        $counter++;
                                    }
                                        endwhile;
                                endif; 
                                wp_reset_postdata(); 
                                ?>
                            </ul>
                        </div><!--col-->
                </div><!--/row-->
            </div><!--/container-->
        </div><!--/twp-news-main-section-->
        <?php
    }   
endif;
add_action('default_mag_action_main_banner', 'default_mag_main_banner', 10);
