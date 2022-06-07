<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<span id="filterscroll"></span>
<div class="mobile-filter">
    <div class="mobile-filter--nav">
        <div class="controls">
            <ul>
                <?php $all_categories = get_terms( array(
  'taxonomy' => 'destination',
  'hide_empty' => true,
  'parent' => 0, 
) );?>
                <li>Filter</li>
                <li type="button" href="#content" data-filter="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" href="#content" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="mobile-filter--button"><span id="mob-filter"><i class="fa-solid fa-filter"></i></span></div>
</div>
<section
    class="safari-type-select <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div id="filtertop" class="side-filter">
            <div class="controls">
                <ul>
                    <?php $all_categories = get_terms( array(
  'taxonomy' => 'destination',
  'hide_empty' => true,
  'parent' => 0, 
) );?>
                    <li>Filter</li>
                    <li type="button" href="#content" data-filter="all">All</li>
                    <?php foreach($all_categories as $category): ?>
                    <li type="button" href="#content" data-filter=".<?php echo $category->slug; ?>">
                        <?php echo $category->name; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>


            <div class="safaritype-grid filter-grid side-filter cust-post-grid">
                <?php
            $term_id = get_sub_field('select_type') ;
            $args = array(
                'post_type' => 'itineraries',
                'posts_per_page' => -1,
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
                <div class="mix tile itin-card post-item <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
                    <?php get_template_part('partials/itin','card');?>
                </div>
                <?php endwhile;
wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>