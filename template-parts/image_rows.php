<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="image-rows-outer <?php if($bgColor == true): echo 'alt-bg'; endif; ?><?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
                if( have_rows('image_row') ):
                while ( have_rows('image_row') ) : the_row();
$images = get_sub_field('images'); ?>
        <div class="image-row <?php the_sub_field('number_or_images'); ?>">
            <?php foreach( $images as $image ): ?>

            <a href="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_attr($image['caption']); ?>"
                class="tile lightbox-gallery"
                style="background-image:url(<?php echo esc_url($image['sizes']['large']); ?>)">

            </a>

            <?php endforeach; ?>
        </div>
        <?php endwhile; endif;?>
    </div>
</section>