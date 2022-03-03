<section class="section-facilityicons">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="<?php the_sub_field('columns'); ?>">
            <?php
                if( have_rows('icon_block') ):
                while ( have_rows('icon_block') ) : the_row();
                $image = get_sub_field('main_icon');?>
            <div class="grid-item facility-icons tile">
                <div class="icon">
                    <?php if( $image ): ?><img src="<?php echo esc_url($image['sizes']['medium']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" /><?php else: ?><?php the_sub_field('icon');?><?php endif; ?>
                </div>
                <div class="pop-over"><?php the_sub_field('icon_description');?>
                </div>
            </div>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>