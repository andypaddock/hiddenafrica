<section class="section-itenerary">
    <div class="row <?php the_sub_field('column_size'); ?>">


        <?php 
$terms = get_sub_field('select_destinations');
if( $terms ): ?>
        <ul>
            <?php foreach( $terms as $term ): ?>
            <li>
                <h2><?php echo esc_html( $term->name ); ?></h2>
                <p><?php echo esc_html( $term->description ); ?></p>
                <?php $destImage = get_field('custom_image', $term); ?>
                <img src="<?php echo $destImage ['sizes'] ['large']; ?>" />
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">View all
                    '<?php echo esc_html( $term->name ); ?>' posts</a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>


    </div>
</section>