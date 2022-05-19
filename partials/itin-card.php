<div class="itin-slide-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="overlay-country">
        <?php $terms = wp_get_post_terms( $post->ID , 'destination', array('parent'=>'0', 'exclude' => '104,105') );?>
        <?php if( $terms ): ?>
        <?php foreach( $terms as $term ): ?>
        <a href="<?php echo esc_url(get_term_link($term)); ?>"
            target="_blank"><span><?php echo esc_html( $term->name ); ?></span></a>
        <?php endforeach; ?><?php endif; ?>
    </div>
</div>
<div class="itin-slide-text">
    <h3 class="heading-tertiary">
        <span class="heading-tertiary--sub italic">
            <?php the_field( 'how_long' ); ?> <?php $terms = get_the_term_list( $post->ID, 'safaritype', '', ',' ); $terms = strip_tags( $terms ); 
if ($terms) {
echo ''.$terms.'';
} else  {
}
?>
        </span>
        <span class="heading-tertiary--main"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
        <span class="heading-tertiary--lower underscores"><?php the_field( 'sub_header' ); ?></span>
    </h3>
    <span class="meta"></span>

    <div class="destination-meta">
        <?php 
$terms = wp_get_post_terms( $post->ID , 'destination', array('childless'=>'true') );
if( $terms ): ?>
        <ul id="places">
            <li>Visiting:</li>
            <?php foreach( $terms as $term ):?>

            <li><?php echo ( $term->name ); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

    </div>


</div>
<div class="itin-slide-button"><a class="button outline"
        href="<?php the_permalink(); ?>"><?php the_field( 'cta_text' ); ?><i class="fa-light fa-chevron-right"></i></a>
</div>