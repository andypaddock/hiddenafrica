<?php
/**
 * ============== Template Name: Destination
 *
 * @package Hidden Africa
 */
get_header();?>

<?php
/**
 * The template for displaying destinations page
 *
 * @package hiddenafrica
 */
get_header(); ?>
<span id="content"></span>
<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
<div class="header__text-box">
    <h1 class="heading-primary">
        <span class="heading-primary--sub"><?php the_field('sub_header'); ?></span>
        <span class="heading-primary--main"><?php echo esc_html( get_the_title() ); ?></span>
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
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>