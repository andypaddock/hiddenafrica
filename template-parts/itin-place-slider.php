<section class="section-itin-camps <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    id="<?php the_sub_field('section_id'); ?>">
    <div class="row <?php the_sub_field('column_size'); ?>">


        <?php
        $terms = get_sub_field('places_to_display');
        if ($terms) : ?>
        <div class="prop-slider owl-carousel owl-theme">
            <?php foreach ($terms as $term) : ?>
            <div class="property-style-block">
                <?php $styleImage = get_field('hero_image', $term); ?>
                <div class="style-text">
                    <span class="meta uppercase">Your Stay</span>
                    <h2 class="heading-secondary"><?php echo esc_html($term->name); ?></h2>

                    <?php
$parent = ( isset( $term->parent ) ) ? get_term_by( 'id', $term->parent, 'destination' ) : false;
?><span class="meta underscores"><?php echo $parent->name; ?></span>



                    <p><?php echo esc_html( $term->description ); ?></p>
                    <a class="button outline" href="<?php echo esc_url(get_term_link($term)); ?>"><i
                            class="far fa-home"></i>Find Out More</a>
                </div>
                <div class="style-image" style="background-image: url(<?php echo $styleImage['url']; ?>)">

                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>