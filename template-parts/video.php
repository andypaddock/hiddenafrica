<?php $flexVideo = get_sub_field('video_file');
        $autoPlay = get_sub_field('autoplay_video');
        $imagePoster = get_sub_field('poster_video');
        $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
        ?>
<section class="expand-video <?php if($bgColor == true): echo 'alt-bg'; endif; ?>
    <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="container-fluid video-container">

        <?php if( have_rows('video') ):?>

        <video <?php if($autoPlay == true): echo 'autoplay'; else: echo 'controls'; endif; ?>
            poster="<?php echo $imagePoster['url'];?>" muted class="flexible-video">

            <source src="<?php echo esc_url( $flexVideo['url'] ); ?>" type="video/mp4">

        </video>

        <?php endif;?>
    </div>
</section>