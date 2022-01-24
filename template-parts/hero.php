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
            <span class="heading-<?php the_field('header_size'); ?>--main"><?php the_field('header'); ?></span>
            <span class="heading-<?php the_field('header_size'); ?>--sub"><?php the_field('sub_header'); ?></span>
        </h1>
    </div>
</div>

<?php elseif ($heroSwitch == 'image'):?>
<div class="hero" style="background-image: url(<?php echo $heroImage['url']; ?>)">
    <div class="header__text-box">
        <h1 class="heading-<?php the_field('header_size'); ?>">
            <span class="heading-<?php the_field('header_size'); ?>--main"><?php the_field('header'); ?></span>
            <span class="heading-<?php the_field('header_size'); ?>--sub"><?php the_field('sub_header'); ?></span>
        </h1>
    </div>
    <?php $quoteSwitch = get_field('quote_type');
            if ($quoteSwitch == 'quote'): ?>

    <div class="header__quote-box">
        <blockquote><?php the_field('quote'); ?></blockquote>
        <cite><?php the_field('cite'); ?></cite>
    </div>
    <?php elseif ($quoteSwitch == 'fade'):?>

    <div class="header__quote-box text-fade">
        <blockquote><?php the_field('fade_text_initial'); ?></blockquote>
        <blockquote><?php the_field('fade_text_second'); ?></blockquote>
    </div>
    <?php endif; ?>
    <!-- <?php $mainBlocks = get_field('main_link_boxes');
            if ($mainBlocks == 'yes'): ?>
    <div class="main_links"><?php get_template_part('template-parts/main-boxes');?></div>
    <?php else:?>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-long-arrow-down fa-4x" href="#content"></a>
        </div>
    </div>
    <?php endif; ?> -->
</div>
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