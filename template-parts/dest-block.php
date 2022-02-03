<?php $bgColor = get_sub_field('bg_colour');?>
<section class="destination-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    id="<?php the_sub_field('section_id'); ?>">

    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="cust-post-grid">
            <?php 
$destinations = get_sub_field('select_dest_block_items');
if( $destinations ): ?>
            <?php foreach( $destinations as $destination ): ?>
            <?php $destImage = get_field('hero_image',$destination); ?>
            <div class="post-item tile <?php echo ' ' . $destination->slug; ?>">
                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <div class="post-image" style="background-image: url(<?php echo $destImage['url']; ?>)">

                    </div>
                </a>
                <div class="post-text">
                    <span class="meta"><?php echo get_the_date(); ?></span>
                    <h2 class="heading-secondary">
                        <a href="<?php echo get_permalink( $post->ID ); ?>">
                            <span
                                class="heading-secondary--main underscores"><?php echo esc_html( $destination->name ); ?></span>
                        </a>
                    </h2>
                    <p><?php echo esc_html( $destination->description ); ?></p>
                </div>
                <div class="post-link">
                    <a class="button outline" href="<?php echo esc_url( get_term_link( $destination ) ); ?>">
                        Find Out more
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>

</section>