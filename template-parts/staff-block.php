<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-staffblock <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    id="<?php the_sub_field('section_id'); ?>">
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php
                if( have_rows('staff') ):
                while ( have_rows('staff') ) : the_row();?>
        <?php $image = get_sub_field('image'); ?>
        <div class="grid-item tile staff-block">
            <div class="image" style="background-image: url(<?php echo $image['sizes']['large']; ?>)">
            </div>
            <div class="text">
                <div class="title">
                    <h3 class="heading-tertiary underscores"><?php the_sub_field('title');?></h3>
                </div>
                <?php if (get_sub_field('sub_title')):?>
                <h3 class="heading-tertiary alt-color"><?php the_sub_field('sub_title');?></h3>
                <?php endif; ?>
                <div class="content-text"><?php the_sub_field('text');?>
                    <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="button overscores <?php the_sub_field('link_style');?>"
                        href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; endif;?>

    </div>
</section>