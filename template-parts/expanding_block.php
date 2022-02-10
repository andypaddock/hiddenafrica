<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
        ?><section
    class="section-videoblock <?php if($bgColor == true): echo 'alt-bg'; endif; ?><?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="wrapper">
        <?php $largeVideo = get_sub_field('video_file');
$largePoster = get_sub_field('poster_image');
$controls = '';
$value = get_sub_field('video_controls');
if ($value) {
  $controls = implode(' ', $value);
};
?>
        <video playsinline <?php echo $controls; ?> id="expand-video" class="expvideo">
            <source src="<?php echo $largeVideo['url'];?>" type="video/mp4">
        </video>
        <div class="playpause"><i class="fas fa-play fa-3x"></i>Play</div>
    </div>
</section>