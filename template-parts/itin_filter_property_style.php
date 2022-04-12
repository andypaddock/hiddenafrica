<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="safari-type-select <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php if(get_sub_field('show_filters')):?>
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
        <?php endif; ?>

        <div class="safaritype-grid filter-grid cust-post-grid">
            <?php
            $term_id = get_sub_field('select_style') ;
            $args = array(
                'post_type' => 'properties',
                'tax_query' => array( 
                    array( 
                        'taxonomy' => 'propertystyle', //or tag or custom taxonomy
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
                <div class="filter-item--text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php echo taxonomy_hierarchy(); ?>
                        </span>

                        <span class="heading-tertiary--main"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </h3>
                    <div class="right_arrow">
                        <div class="arrow bounce">
                            <a class="fal fa-chevron-right fa-2x" href="<?php the_permalink(); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;
wp_reset_postdata();
?>
        </div>
    </div>
</section>