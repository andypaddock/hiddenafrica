<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="safari-type-select <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="controls">
            <ul>
                <?php $all_categories = get_terms( array(
  'taxonomy' => 'destination',
  'hide_empty' => true,
  'parent' => 0
) );?>
                <li>Filter</li>
                <li type="button" data-filter="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>


        <div class="safaritype-grid filter-grid cust-post-grid">
            <?php
            $term_id = get_sub_field('select_type') ;
            $args = array(
                'post_type' => 'itineraries',
                'tax_query' => array( 
                    array( 
                        'taxonomy' => 'safaritype', //or tag or custom taxonomy
                        'field' => 'id', 
                        'terms' => array($term_id) 
                    ) 
                ) 
            );
            $loop = new WP_Query($args);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$days_field = get_field( 'how_long', $post->ID );
$custom_field = get_field( 'call_to_action_text', $post->ID );
$counter++;

?>
            <?php $terms = wp_get_post_terms( $post->ID, 'destination' ); ?>
            <div class="mix tile post-item <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">

                <div class="filter-item--image" style="background-image: url(<?php echo $mainImage; ?>)">
                </div>
                <div class="post-text">
                    <span class="meta "><?php echo esc_html( $days_field ); ?></span>
                    <h2 class="heading-secondary underscores">
                        <a href="<?php the_permalink(); ?>">
                            <span class="heading-secondary--main"><?php the_title(); ?></span>
                        </a>
                    </h2>
                    <div class="destination-meta">
                        <?php 
$terms = get_field('where_to');
if( $terms ): ?>
                        <ul id="places">
                            <?php foreach( $terms as $term ): ?>
                            <li>
                                <?php echo esc_html( $term->name ); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>

                    </div>
                    <div class="post-link">
                        <a class="button outline" href="<?php the_permalink(); ?>">
                            <?php echo esc_html( $custom_field ); ?><i class="fa-light fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile;
wp_reset_postdata();
?>
        </div>
    </div>
</section>