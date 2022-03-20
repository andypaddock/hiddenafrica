<section class="section-itin-camps <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php if( have_rows('itinerary_maker') ): ?>
        <div class="prop-slider owl-carousel owl-theme">
            <?php while( have_rows('itinerary_maker') ): the_row();  ?>

            <?php $term = get_sub_field('destination');
        if( $term ): ?>


            <div class="property-style-block">
                <?php $styleImage = get_field('hero_image', $term); ?>
                <div class="style-text">
                    <span class="meta uppercase">Your Stay</span>
                    <h2 class="heading-secondary"><?php echo esc_html($term->name); ?></h2>

                    <?php
$parent = ( isset( $term->parent ) ) ? get_term_by( 'id', $term->parent, 'destination' ) : false;
?><span class="meta italic underscores"><?php echo $parent->name; ?></span>



                    <p><?php the_field('short_description', $term); ?></p>
                    <a class="button outline itin-button" href="<?php echo esc_url(get_term_link($term)); ?>">
                        <div class="icon"><i class="far fa-home"></i></div>
                        <div class="text"><?php the_sub_field('number_of_nights'); ?> Nights in <span
                                class="camp-name"><?php echo esc_html($term->name); ?></span></div>
                        <i class="fa-light fa-chevron-right"></i>
                    </a>
                </div>
                <div class="style-image" style="background-image: url(<?php echo $styleImage['url']; ?>)">

                </div>
            </div>


            <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>