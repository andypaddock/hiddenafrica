<section class="button-elements">
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php if( have_rows('button_element') ): while ( have_rows('button_element') ) : the_row(); ?>

        <div class="button-item">

            <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button outline" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php the_sub_field('button_icon'); ?><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>

        </div>

        <?php  endwhile; endif; ?>
    </div>
</section>