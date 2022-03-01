<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
 ?>
<section
    class="section-imagetext <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
                if( have_rows('blocks') ):
                while ( have_rows('blocks') ) : the_row();?>
        <?php $image = get_sub_field('image');
        $readMore = get_sub_field('add_read_more');
                $rowReverse = get_sub_field('reverse_layout'); ?>
        <div
            class="grid-item tile image-text-block <?php if($rowReverse == true): echo 'row-reverse'; else: echo 'row-default'; endif; ?>">
            <div class="image" style="background-image: url(<?php echo $image['sizes']['large']; ?>)">
            </div>
            <div class="text">
                <div class="title">
                    <h3 class="heading-secondary underscores"><?php the_sub_field('title');?></h3>
                </div>
                <h3 class="heading-tertiary alt-color"><?php the_sub_field('sub_title');?></h3>
                <div class="content-text <?php if($readMore == true): echo 'readmore'; endif; ?>">
                    <?php the_sub_field('text');?>
                    <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="button <?php the_sub_field('link_style');?>" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                            class="fa-light fa-chevron-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; endif;?>

    </div>
</section>