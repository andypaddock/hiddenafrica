<span id="filterscroll"></span>
<?php
$filterType = get_sub_field( 'filter_by' );?>
<div class="mobile-filter">
    <div class="mobile-filter--nav">
        <div class="controls">
            <ul>
                <?php $all_categories = get_terms( array(
  'taxonomy' => $filterType,
  'hide_empty' => true,
) );?>
                <li>Filter</li>
                <li type="button" data-filter="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="mobile-filter--button"><span id="mob-filter"><i class="fa-solid fa-filter"></i></span></div>

</div>
<section class="side-filter-section" id="filter-section">

    <div class="row">
        <div class="side-filter">
            <div class="controls">
                <ul>
                    <?php $all_categories = get_terms( array(
  'taxonomy' => $filterType,
  'hide_empty' => true,
) );?>
                    <li>Filter</li>
                    <li type="button" data-filter="all">All</li>
                    <?php foreach($all_categories as $category): ?>
                    <li type="button" data-filter=".<?php echo $category->slug; ?>">
                        <?php echo $category->name; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>



            <div class="filter-grid side-filter">
                <?php
$filterElement = get_sub_field( 'itin_prop' );
$loop = new WP_Query(
    array(
        'post_type' => $filterElement, 
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'hidden_from_our_collection',
                'value' => '1',
                'compare' => '!='
            ),
            array(
                'key' => 'hidden_from_our_collection',
                'value' => '1',
                'compare' => 'NOT EXISTS'
            )
        )
        
    )
);
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
                <?php $terms = wp_get_post_terms( $post->ID, $filterType ); ?>

                <div class="mix tile filter-item <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">

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

    </div>

</section>