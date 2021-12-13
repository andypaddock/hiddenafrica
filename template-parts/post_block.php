<section class="post-block" id="post-section">

    <div class="row w80">
        <div class="controls">
            <ul>
                <?php $all_categories = get_categories(array(
        'hide_empty' => true
    ));?>
                <li>Filter</li>
                <li type="button" data-filter="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>



        <div class="post-grid filter-grid">
            <?php
$loop = new WP_Query(
    array(
        'posts_per_page' => -1,
    )
);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
            <?php $terms = get_the_category( $post->ID ); ?>

            <div class="mix quote <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <div class="test-image" style="background-image: url(<?php echo $mainImage; ?>)">

                        <?php get_template_part("inc/img/kitlogo"); ?>

                    </div>
                </a>
                <h2 class="heading-highlight"><?php the_title(); ?></h2>
            </div>
            <?php endwhile;
wp_reset_postdata();
?>
        </div>

    </div>

</section>