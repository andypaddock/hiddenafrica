<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="post-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>

    <div class="row <?php the_sub_field('column_size'); ?>">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_sub_field('sub_title'); ?></span>
            <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>

        </h2>
        <?php if(get_sub_field('show_filters')):?>
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
        <?php endif; ?>


        <div class="post-grid filter-grid">
            <?php
            $numberPosts = get_sub_field('posts_to_show');
$loop = new WP_Query(
    array(
        'posts_per_page' => $numberPosts,
    )
);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
            <?php $terms = get_the_category( $post->ID ); ?>

            <div class="mix tile quote <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <div class="post-image" style="background-image: url(<?php echo $mainImage; ?>)">

                    </div>
                </a>
                <div class="post-text">
                    <span class="meta"><?php echo get_the_date(); ?></span>
                    <h2 class="heading-secondary">
                        <a href="<?php echo get_permalink( $post->ID ); ?>">
                            <span class="heading-secondary--sub underscores"><?php the_title(); ?></span>
                        </a>
                    </h2>
                    <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                </div>
                <div class="post-link">
                    <a class="overscores" href="<?php echo get_permalink( $post->ID ); ?>">
                        Read more
                    </a>
                </div>
            </div>
            <?php endwhile;
wp_reset_postdata();
?>
        </div>

    </div>

</section>