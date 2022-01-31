<section class="section-videoblock">
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