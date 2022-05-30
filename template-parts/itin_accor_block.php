<?php $bgColor = get_sub_field('bg_colour');?>
<section class="accordian <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="toggle-block row <?php the_sub_field('column_size'); ?>">

        <?php if( have_rows('itinerary_maker') ): $count = 0; while ( have_rows('itinerary_maker') ) : the_row(); ?>
        <?php $bgHighlight = get_sub_field('highlight');?>
        <div class="item tile <?php if($bgHighlight == true): echo 'highlight'; endif; ?>">

            <label>
                <span class="heading italic"><?php the_sub_field('day_description'); ?></span>
                <span class="heading underscores"><?php the_sub_field('itin_step_title'); ?></span>
                <i class="fal fa-chevron-right"></i>
            </label>
            <div class="content mb2">
                <?php the_sub_field('itin_step_desc'); ?>
            </div>

        </div>

        <?php $count++; endwhile; endif; ?>
    </div>
</section>