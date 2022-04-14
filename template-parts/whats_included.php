<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
$titleStyle = get_sub_field ('style');?>
<section
    class="simple-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="simple-text-block">
            <div class="text">
                <?php if (get_sub_field('title')):?>
                <div class="title">
                    <?php if($titleStyle == "h2"):?>
                    <h3 class="heading-secondary underscores"><?php the_sub_field('title');?></h3>
                    <?php elseif($titleStyle == "h3"):?>
                    <h3 class="heading-tertiary overscores"><?php the_sub_field('title');?></h3>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="included-text <?php the_sub_field('columns');?>">
                    <div class="main-column">
                        <?php the_sub_field('column_one');?>
                    </div>
                    <div class="alt-column">
                        <?php the_sub_field('column_two');?>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>