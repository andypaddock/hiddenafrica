<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-hightlightmap <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row full">

        <?php $image = get_sub_field('map_image');
                $rowReverse = get_sub_field('reverse_layout');
                $selectMedia = get_sub_field('image_or_map'); ?>
        <div class="map-item">
            <?php if ($selectMedia == 'map'): ?>
            <?php get_template_part('partials/simple','map');?>
            <?php elseif ($selectMedia == 'image'):?>

            <div class="map-image image fmleft">
                <a href="<?php echo esc_url($image['url']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
                <div class="overlay-link">
                    <a href="<?php echo esc_url($image['url']); ?>">
                        <i class="fa-solid fa-location-dot"></i> View Map
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <div class="highlight-text">
                <?php
                if( have_rows('blocks') ):
                while ( have_rows('blocks') ) : the_row();?>
                <div class="text tile">
                    <?php if (get_sub_field('title')):?>
                    <h3 class="heading-tertiary"><?php the_sub_field('title');?></h3>
                    <?php endif;?>
                    <?php the_sub_field('text');?>
                </div>

                <?php endwhile; endif;?>
            </div>




        </div>
    </div>
</section>