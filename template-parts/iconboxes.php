<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="section-iconboxes  <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="<?php the_sub_field('columns'); ?>">
            <?php
                if( have_rows('icon_block') ):
                while ( have_rows('icon_block') ) : the_row();
                $image = get_sub_field('main_icon');?>
            <div class="grid-item icon-block tile">
                <div class="icon">
                    <?php if( $image ): ?><img src="<?php echo esc_url($image['sizes']['medium']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" /><?php else: ?><?php the_sub_field('icon');?><?php endif; ?>
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