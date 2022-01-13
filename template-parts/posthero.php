<?php $heroImage = get_field('hero_image'); 
$heroVideo = get_field('background_video');
$heroMobile = get_field('mobile_video');
$heroPoster = get_field('video_poster');?>
<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
</div>