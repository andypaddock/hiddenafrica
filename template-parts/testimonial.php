<?php $darkBG = get_sub_field('dark_background');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="testimonial-slider <?php if($darkBG == true): echo 'alt-bg-color'; endif;?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="owl-carousel owl-theme testimonial-carousel">

            <?php if( have_rows('short_testimonial','options') ): ?>
            <?php while( have_rows('short_testimonial','options') ): the_row(); ?>

            <div class="quote">

                <div class="copy"><?php the_sub_field('testimonial');?></div>
                <div class="centre-line">
                    <div class="line"></div>
                    <div></div>
                </div>
                <p class="quote-cite"><?php the_sub_field('name');?></p>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <?php $moreButton = get_sub_field('hide_button');
        if($moreButton == false):?>
        <?php 
$link = get_field('testimonial_link', 'options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
        <a class="button" href="<?php echo esc_url( $link_url ); ?>"
            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</section>