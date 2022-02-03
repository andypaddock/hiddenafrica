<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-iconboxes <?php if($bgColor == true): echo 'alt-bg'; endif; ?>">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="<?php the_sub_field('columns'); ?>">
            <?php
                if( have_rows('icon_block') ):
                while ( have_rows('icon_block') ) : the_row();?>
            <div class="grid-item icon-block tile">
                <div class="icon">
                    <?php the_sub_field('icon');?>
                </div>
                <div class="icon-title">
                    <h2 class="heading-tertiary underscores"><?php the_sub_field('icon_title');?></h2>
                </div>
                <div class="content-text"><?php the_sub_field('icon_description');?>
                    <?php 
$link = get_sub_field('icon_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>