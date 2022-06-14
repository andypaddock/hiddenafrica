<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
$whiteBG = get_sub_field('text_box_bg'); ?>
<section
    class="post-block imgtext-slider <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>

    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="slick-center owl-carousel owl-theme">
            <?php
                if( have_rows('slider_blocks') ):
                while ( have_rows('slider_blocks') ) : the_row();?>
            <?php $image = get_sub_field('image'); ?>
            <div class="slider-block">
                <div class="image">
                    <img src=" <?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
                <div class="text <?php if($whiteBG == true): echo 'white-bg'; endif; ?>">
                    <div class="title">
                        <h3 class="heading-secondary"><?php the_sub_field('title');?></h3>
                    </div>

                    <!-- <div class="content-text">
                        <?php the_sub_field('text');?>

                    </div> -->
                </div>
            </div>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>