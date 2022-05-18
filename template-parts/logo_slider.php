<section class="section-title logo-slider-title">
    <!-- <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div> -->
    <h3 class="heading-secondary">
        <!-- <span class="heading-primary--sub italic"><?php the_field('partner_top_header','options'); ?></span> -->
        <span class="heading-secondary--main"><?php the_field('partner_sub_header','options'); ?></span>

        </h2>
</section>
<section class="logo-slider">
    <div class="row">
        <div class="owl-carousel owl-theme logo-carousel">

            <?php if( have_rows('partner_logos','options') ): ?>
            <?php while( have_rows('partner_logos','options') ): the_row(); ?>
            <div class="logo">
                <?php 
$link = get_sub_field('link','options');
$partLogo = get_sub_field('logo','options');
if ($link):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img
                        src="<?php echo esc_url($partLogo['url']); ?>"
                        alt="<?php echo esc_attr($partLogo['alt']); ?>" /></a>

                <?php else: ?>
                <img src="<?php echo esc_url($partLogo['url']); ?>" alt="<?php echo esc_attr($partLogo['alt']); ?>" />
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>