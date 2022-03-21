<?php
/**
 * The template for displaying all single posts
 *
 * @package hiddenafrica
 */
get_header(); ?>

<div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
<div class="header__text-box">
    <h1 class="heading-primary">
        <span class="heading-primary--sub"><?php the_field('sub_header'); ?></span>
        <span
            class="heading-primary--main"><?php if (get_field('header')): ?><?php the_field('header'); ?><?php else: ?><?php the_title(); ?><?php endif ?></span>
    </h1>
</div>
<div class="down_arrow">
    <div class="arrow bounce">
        <a class="fal fa-chevron-down fa-3x" href="#content"></a>
    </div>
</div>

<span id="content"></span>
<?php if( have_rows('main_page_elements') ): ?>
<?php while( have_rows('main_page_elements') ): the_row(); ?>
<?php if( get_row_layout() == 'faq_blocks' ): ?>
<?php get_template_part('template-parts/faqblock');?>
<?php elseif( get_row_layout() == 'main_cat_links' ): ?>
<?php get_template_part('template-parts/main-boxes-page');?>
<?php elseif( get_row_layout() == 'text_blocks' ):?>
<?php get_template_part('template-parts/text');?>
<?php elseif( get_row_layout() == 'more_text' ):?>
<?php get_template_part('template-parts/moretext');?>
<?php elseif( get_row_layout() == 'tabbed' ):?>
<?php get_template_part('template-parts/tabs');?>
<?php elseif( get_row_layout() == 'section_title' ):?>
<?php get_template_part('template-parts/title');?>
<?php elseif( get_row_layout() == 'feature_boxes' ):?>
<?php get_template_part('template-parts/boxes');?>
<?php elseif( get_row_layout() == 'testimonial_block' ):?>
<?php get_template_part('template-parts/testimonial_block');?>
<?php elseif( get_row_layout() == 'testimonial_slider' ):?>
<?php get_template_part('template-parts/testimonial');?>
<?php elseif( get_row_layout() == 'single_testimonial' ):?>
<?php get_template_part('template-parts/singletestimonial');?>
<?php elseif( get_row_layout() == 'boxedcontent' ):?>
<?php get_template_part('template-parts/boxedcontent');?>
<?php elseif( get_row_layout() == 'contact_links' ):?>
<?php get_template_part('template-parts/links');?>
<?php elseif( get_row_layout() == 'shortcode' ):?>
<?php get_template_part('template-parts/shortcode');?>
<?php elseif( get_row_layout() == 'blog_posts' ):?>
<?php get_template_part('template-parts/post_block');?>
<?php elseif( get_row_layout() == 'map_locations' ):?>
<?php get_template_part('template-parts/mappins');?>
<?php elseif( get_row_layout() == 'single_button' ):?>
<?php get_template_part('template-parts/singlebutton');?>
<?php elseif( get_row_layout() == 'bordered_text' ):?>
<?php get_template_part('template-parts/borderedcontent');?>
<?php elseif( get_row_layout() == 'icon_boxes' ):?>
<?php get_template_part('template-parts/iconboxes');?>
<?php elseif( get_row_layout() == 'image_boxes' ):?>
<?php get_template_part('template-parts/imageboxes');?>
<?php elseif( get_row_layout() == 'itinerary_block' ):?>
<?php get_template_part('template-parts/itinerary');?>
<?php elseif( get_row_layout() == 'advertblock' ):?>
<?php get_template_part('template-parts/advertblock');?>
<?php elseif( get_row_layout() == 'image_and_text_block' ):?>
<?php get_template_part('template-parts/imagetextblock');?>
<?php elseif( get_row_layout() == 'destinations_slider' ):?>
<?php get_template_part('template-parts/dest-slider');?>
<?php elseif( get_row_layout() == 'prop_type_slider' ):?>
<?php get_template_part('template-parts/prop-style');?>
<?php elseif( get_row_layout() == 'type_filter' ):?>
<?php get_template_part('template-parts/type_filter');?>
<?php elseif( get_row_layout() == 'facility_icons' ):?>
<?php get_template_part('template-parts/facility_icons');?>
<?php elseif( get_row_layout() == 'gallery_block' ):?>
<?php get_template_part('template-parts/gallery_block');?>
<?php elseif( get_row_layout() == 'accor_block' ):?>
<?php get_template_part('template-parts/accor_block');?>
<?php elseif( get_row_layout() == 'button_block' ):?>
<?php get_template_part('template-parts/button_block');?>
<?php elseif( get_row_layout() == 'highlight_block' ):?>
<?php get_template_part('template-parts/highlight_block');?>
<?php elseif( get_row_layout() == 'advert_block' ):?>
<?php get_template_part('template-parts/advert_block');?>
<?php elseif( get_row_layout() == 'video_element' ):?>
<?php get_template_part('template-parts/expanding_block');?>
<?php elseif( get_row_layout() == 'dest_block' ):?>
<?php get_template_part('template-parts/dest-block');?>
<?php elseif( get_row_layout() == 'cust_post_block' ):?>
<?php get_template_part('template-parts/cust-post-block');?>
<?php elseif( get_row_layout() == 'staff_block' ):?>
<?php get_template_part('template-parts/staff-block');?>
<?php elseif( get_row_layout() == 'site_wide_start_safari' ):?>
<?php get_template_part('template-parts/site-wide-text');?>
<?php elseif( get_row_layout() == 'place_slider' ):?>
<?php get_template_part('template-parts/itin-place-slider');?>
<?php elseif( get_row_layout() == 'simple_text' ):?>
<?php get_template_part('template-parts/simple_text');?>
<?php elseif( get_row_layout() == 'multi_filter_blog_posts' ):?>
<?php get_template_part('template-parts/multi_filter_post_block');?>
<?php elseif( get_row_layout() == 'itin_filter_safari_type' ):?>
<?php get_template_part('template-parts/itin_filter_safari_type');?>
<?php elseif( get_row_layout() == 'itin_sig_block' ):?>
<?php get_template_part('template-parts/itin-sig-block');?>
<?php elseif( get_row_layout() == 'facility_display' ):?>
<?php get_template_part('template-parts/facility-display');?>
<?php elseif( get_row_layout() == 'activity_display' ):?>
<?php get_template_part('template-parts/activity-display');?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>