<section class="section-destinations">
    <div class="row <?php the_sub_field('column_size'); ?>">


        <?php 
$terms = get_sub_field('select_destinations');
if( $terms ): ?>
        <div class="destination-grid <?php the_sub_field('columns');?>">
            <?php foreach( $terms as $term ): ?>
            <div class="destination-item">
                <?php $destImage = get_field('custom_image', $term); ?>
                <div class="dest-image" style="background-image: url(<?php echo $destImage['url']; ?>)"></div>
                <div class="dest-text">
                    <h2 class="heading-secondary underscores"><?php echo esc_html( $term->name ); ?></h2>
                    <p><?php echo esc_html( $term->description ); ?></p>


                    <a class="button outline" href="<?php echo esc_url( get_term_link( $term ) ); ?>">View all
                        <?php echo esc_html( $term->name ); ?> destinations<i class="fa-light fa-chevron-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>


    </div>
</section>