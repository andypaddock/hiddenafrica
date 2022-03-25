<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-hightlightmap <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php $image = get_sub_field('map_image');
                $rowReverse = get_sub_field('reverse_layout'); ?>
        <div class="map-item">
            <div class="image fmleft">
                <a href="<?php echo esc_url($image['url']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
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