<?php $heroImage = get_field('hero_image'); 
$heroVideo = get_field('background_video');
$heroMobile = get_field('mobile_video');
$heroPoster = get_field('video_poster');?>





<div class="hero" style="background-image: linear-gradient(
      0deg,
      rgba(4, 11, 46, 1) 20%,
      rgba(4, 11, 46, 0) 50%
    ),url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="header__text-box">
        <h1 class="heading-primary">
            <span class="heading-primary--main"><?php echo esc_html( get_the_title() ); ?></span>
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

    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-long-arrow-down fa-4x" href="#content"></a>
        </div>
    </div>

</div>