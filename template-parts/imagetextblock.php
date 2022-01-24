<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-imagetext <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    id="<?php the_sub_field('section_id'); ?>">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php if( get_sub_field('section_title') ): ?>
        <div class="optional-header">
            <div class="centre-line">
                <div class="line"></div>
                <div></div>
            </div>
            <h3 class="heading-tertiary alt-color"><?php the_sub_field('section_sub_title');?></h3>
            <h3 class="heading-secondary"><?php the_sub_field('section_title');?></h3>
        </div>
        <?php endif; ?>

        <?php
                if( have_rows('blocks') ):
                while ( have_rows('blocks') ) : the_row();?>
        <?php $image = get_sub_field('image');
                $rowReverse = get_sub_field('reverse_layout'); ?>
        <div class="grid-item image-text-block <?php if($rowReverse == true): echo 'row-reverse'; endif; ?>">
            <div class="image" style="background-image: url(<?php echo $image['sizes']['large']; ?>)">
            </div>
            <div class="text">
                <div class="title">
                    <h3 class="heading-secondary"><?php the_sub_field('title');?></h3>
                </div>
                <h3 class="heading-tertiary alt-color"><?php the_sub_field('sub_title');?></h3>
                <div class="content-text"><?php the_sub_field('text');?>
                    <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="button <?php the_sub_field('link_style');?>" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; endif;?>

    </div>
</section>