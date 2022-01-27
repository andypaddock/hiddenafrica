<section class="section-facilityicons">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="<?php the_sub_field('columns'); ?>">
            <?php
                if( have_rows('icon_block') ):
                while ( have_rows('icon_block') ) : the_row();?>
            <div class="grid-item facility-icons tile">
                <div class="icon">
                    <?php the_sub_field('icon');?>
                </div>
                <div class="pop-over"><?php the_sub_field('icon_description');?>
                </div>
            </div>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>