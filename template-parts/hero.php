<?php $heroImage = get_field('hero_image'); 
$heroVideo = get_field('background_video');
$heroMobile = get_field('mobile_video');
$heroPoster = get_field('video_poster');
$mapimage = get_field('map_image');?>
<?php $heroSwitch = get_field('hero_type');
            if ($heroSwitch == 'video'): ?>


<div class="hero">
    <video playsinline autoplay muted loop poster="<?php echo $heroPoster['url'];?>" id="bgvideo">
        <?php if ($heroMobile): ?>
        <source src="<?php echo $heroMobile['url'];?>" type="video/mp4" media="all and (max-width: 480px)">
        <?php endif; ?>
        <source src="<?php echo $heroVideo['url'];?>" type="video/mp4">
    </video>
    <div class="header__text-box">
        <h1 class="heading-<?php the_field('header_size'); ?>">
            <span
                class="heading-<?php the_field('header_size'); ?>--main"><?php if (get_field('header')): ?><?php the_field('header'); ?><?php else: ?><?php the_title(); ?><?php endif ?></span>
            <span class="heading-<?php the_field('header_size'); ?>--sub"><?php the_field('sub_header'); ?></span>
        </h1>
    </div>
</div>

<?php elseif ($heroSwitch == 'image'):?>
<div class="hero <?php the_field('image_anchor');?> imageoff-<?php the_field('image_offset');?> darkoverlay-<?php the_field('image_overlay');?>"
    style="background-image: url(<?php if ($heroImage): ?><?php echo $heroImage['sizes'] ['hero-image']; ?><?php else: ?><?php echo get_the_post_thumbnail_url( get_the_ID(), 'hero-image' ); ?><?php endif ?>)">
    <?php if (is_front_page()): ?>
    <div class="header__text-box">
        <h1 class="heading-<?php the_field('header_size'); ?>">
            <span
                class="heading-<?php the_field('header_size'); ?>--main"><?php if (get_field('header')): ?><?php the_field('header'); ?><?php else: ?><?php the_title(); ?><?php endif ?></span>
            <span class="heading-<?php the_field('header_size'); ?>--sub"><?php the_field('sub_header'); ?></span>
        </h1>
    </div>


    <div class="home-link row">
        <?php 
$link = get_field('home_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
        <a class="button outline" href="<?php echo esc_url( $link_url ); ?>"
            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-3x" href="#content"></a>
        </div>
    </div>


</div>
<?php if (!is_front_page()): ?>
<div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
<div class="header__text-box">
    <h1 class="heading-primary">

        <span
            class="heading-primary--main"><?php if (get_field('header')): ?><?php the_field('header'); ?><?php else: ?><?php the_title(); ?><?php endif ?></span>
        <span class="heading-primary--sub italic"><?php the_field('sub_header'); ?></span>
    </h1>

</div>
<?php endif; ?>
<?php elseif ($heroSwitch == 'map'):?>
<div class="hero map-popup" style="background-image: url(<?php echo $mapimage['url']; ?>)">


    <div class="map-link">
        <a class="pop-link" href="#popupmap">
            <i class="far fa-bars"></i>
            <span>See Whole Map</span>
        </a>
    </div>


</div>


<div class="popup" id="popupmap">
    <div class="popup__content">
        <div class="popup__full poster">
            <a href="#testimonial-section" class="popup__close">&times;</a>
            <img src="<?php echo $mapimage['sizes'] ['large']; ?>" />
        </div>
    </div>
</div>
<?php endif;?>