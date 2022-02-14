<?php $bgColor = get_sub_field('bg_colour');?>
<section class="custom-post-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    id="<?php the_sub_field('section_id'); ?>">

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
        <?php
$featured_posts = get_sub_field('post_type');
if( $featured_posts ): ?>
        <div class="cust-post-grid">
            <?php foreach( $featured_posts as $post ): 
        $permalink = get_permalink( $post->ID );
        $title = get_the_title( $post->ID );
        $custom_field = get_field( 'call_to_action_text', $post->ID );
        $days_field = get_field( 'how_long', $post->ID );
        $safariType = get_the_terms( $post->ID, 'safaritype' );
        setup_postdata($post); ?>
            <div class="post-item tile limit-four">
                <a href="<?php echo esc_url( $permalink ); ?>">
                    <div class="post-image"
                        style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>)">

                    </div>
                </a>
                <div class="post-text">
                    <span class="meta underscores"><?php 
    $terms = get_the_terms( $post->ID, 'safaritype' ); 
    foreach($terms as $term) {
      echo $term->name;
    }
?></span>
                    <h2 class="heading-secondary">
                        <a href="<?php echo esc_url( $permalink ); ?>">
                            <span class="heading-secondary--main"><?php echo esc_html( $title ); ?></span>
                        </a>
                    </h2>
                    <span class="days"><?php echo esc_html( $days_field ); ?></span>
                    <div class="destination-meta">
                        <div class="main"><?php $terms = get_the_terms( $post->ID, array('destination') ); ?>

                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term);?>
                            <?php if ($placeType == 'country'):?>
                            <span class="<?php the_field('dest_type', $term)?>"><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                        <div class="sub">

                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term);?>
                            <?php if ($placeType == 'place'):?>
                            <span class="<?php the_field('dest_type', $term)?>"><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <div class="post-link">
                    <a class="button outline" href="<?php echo esc_url( $permalink ); ?>">
                        <?php echo esc_html( $custom_field ); ?><i class="fa-light fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        <div class="row centre-line w50">
            <div class="line"></div>
            <div></div>
        </div>
        <a href="#" id="loadMore">Load More</a>
        <?php endif; ?>
    </div>
</section>