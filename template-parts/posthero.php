<?php $heroImage = get_field('hero_image'); ?>

<div class="hero <?php the_field('image_anchor');?> imageoff-<?php the_field('image_offset');?>  darkoverlay-<?php the_field('image_overlay');?>"
    style="background-image: url(<?php if ($heroImage): ?><?php echo $heroImage['sizes'] ['hero-image']; ?><?php else: ?><?php echo get_the_post_thumbnail_url( get_the_ID(), 'hero-image' ); ?><?php endif ?>)">
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-3x" href="#content"></a>
        </div>
    </div>
</div>
<div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
<div class="header__text-box">
    <h1 class="heading-primary">

        <span
            class="heading-primary--main"><?php if (get_field('header')): ?><?php the_field('header'); ?><?php else: ?><?php the_title(); ?><?php endif ?></span>
        <span class="heading-primary--sub"><?php the_field('sub_header'); ?></span>
    </h1>
</div>