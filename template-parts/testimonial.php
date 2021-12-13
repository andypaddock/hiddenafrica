<section class="testimonial-slider">
    <div class="row w60">
        <div class="owl-carousel owl-theme testimonial-carousel">
            <?php
$loop = new WP_Query(
    array(
        'post_type' => 'testimonial', // This is the name of your post type - change this as required,
        'posts_per_page' => -1,
        'meta_key' => 'testimonial_type',
        'meta_value' => 'text'
    )
);
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
// The content you want to loop goes in here:
?>

            <div class="quote">
                <?php get_template_part("inc/img/quote"); ?>
                <p class="copy"><?php the_field('text_content');?></p>
                <div class="centre-line">
                    <div class="line"></div>
                    <div></div>
                </div>
                <p class="quote-cite"><?php the_title(); ?></p>

            </div>

            <?php endwhile;
wp_reset_postdata();
?>
        </div>
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
</section>
<script>
// TESTIMONIAL GRID FILTER

var mixer = mixitup('.testimonial-grid', {
    controls: {
        toggleLogic: 'and'
    }
});
</script>