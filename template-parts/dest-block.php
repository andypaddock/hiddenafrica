<?php $bgColor = get_sub_field('bg_colour');?>
<section class="destination-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    id="<?php the_sub_field('section_id'); ?>">

    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="cust-post-grid tri-col">
            <?php 
$destinations = get_sub_field('select_dest_block_items');
if( $destinations ): ?>
            <?php foreach( $destinations as $destination ): ?>
            <?php $destImage = get_field('hero_image',$destination); ?>
            <div class="post-item tile <?php echo ' ' . $destination->slug; ?>">
                <a href="<?php echo esc_url( get_term_link( $destination ) ); ?>">
                    <div class="post-image" style="background-image: url(<?php echo $destImage['url']; ?>)">

                    </div>
                </a>
                <div class="post-text">
                    <span class="meta"><?php the_field('sub_header',$destination); ?></span>
                    <h2 class="heading-secondary">
                        <a href="<?php echo esc_url( get_term_link( $destination ) ); ?>">
                            <span
                                class="heading-secondary--main underscores"><?php echo esc_html( $destination->name ); ?></span>
                        </a>
                    </h2>
                    <p><?php the_field('short_description',$destination); ?></p>
                </div>
                <div class="post-link">
                    <a class="button outline" href="<?php echo esc_url( get_term_link( $destination ) ); ?>">
                        Find Out more<i class="fa-light fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>

</section>