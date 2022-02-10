<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?><section
    class="section-title <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>

    <div class="row <?php the_sub_field('column_size'); ?>">


        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_sub_field('sub_title'); ?></span>
            <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>

        </h2>


    </div>
</section>