<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="dates-rates <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="toggle-dates row <?php the_sub_field('column_size'); ?>">

        <?php if( have_rows('main_dates_table') ): $count = 0; while ( have_rows('main_dates_table') ) : the_row(); ?>

        <div class="item tile">

            <label>
                <h2 class="heading-secondary">
                    <span class="heading-secondary--main"><?php the_sub_field('table_header'); ?></span>

                </h2>
                <i class="fal fa-chevron-right fa-2x"></i>
            </label>
            <div class="content mb2">
                <?php if( get_sub_field('table_description') ): ?><p class="italic alt-font">
                    <?php the_sub_field('table_description'); ?></p><?php endif; ?>
                <?php $table = get_sub_field( 'dates_table' );

if ( ! empty ( $table ) ) {

    echo '<table class="dates-table" border="0">';

        if ( ! empty( $table['caption'] ) ) {

            echo '<caption>' . $table['caption'] . '</caption>';
        }

        if ( ! empty( $table['header'] ) ) {

            echo '<thead>';

                echo '<tr>';

                    foreach ( $table['header'] as $th ) {

                        echo '<th>';
                            echo $th['c'];
                        echo '</th>';
                    }

                echo '</tr>';

            echo '</thead>';
        }

        echo '<tbody>';

            foreach ( $table['body'] as $tr ) {

                echo '<tr>';

                    foreach ( $tr as $td ) {

                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
                    }

                echo '</tr>';
            }

        echo '</tbody>';

    echo '</table>';
} ?>
                <?php if( get_sub_field('date_table_optional_text') ): ?><p class="italic alt-font">
                    <?php the_sub_field('date_table_optional_text'); ?></p><?php endif; ?>
            </div>

        </div>

        <?php $count++; endwhile; endif; ?>
    </div>

    <div class="toggle-rates row <?php the_sub_field('column_size'); ?>">

        <?php if( have_rows('main_rates_table') ): $count = 0; while ( have_rows('main_rates_table') ) : the_row(); ?>

        <div class="rates-block tile">


            <h2 class="heading-secondary">
                <span class="heading-secondary--main"><?php the_sub_field('table_header'); ?></span>

            </h2>



            <?php if( get_sub_field('table_description') ): ?><p class="italic alt-font">
                <?php the_sub_field('table_description'); ?></p><?php endif; ?>
            <?php $table = get_sub_field( 'rates_table' );

if ( ! empty ( $table ) ) {

echo '<table class="rates-table" border="0">';

if ( ! empty( $table['caption'] ) ) {

    echo '<caption>' . $table['caption'] . '</caption>';
}

if ( ! empty( $table['header'] ) ) {

    echo '<thead>';

        echo '<tr>';

            foreach ( $table['header'] as $th ) {

                echo '<th>';
                    echo $th['c'];
                echo '</th>';
            }

        echo '</tr>';

    echo '</thead>';
}

echo '<tbody>';

    foreach ( $table['body'] as $tr ) {

        echo '<tr>';

            foreach ( $tr as $td ) {

                echo '<td>';
                    echo $td['c'];
                echo '</td>';
            }

        echo '</tr>';
    }

echo '</tbody>';

echo '</table>';
} ?>
            <?php if( get_sub_field('rates_optional_text') ): ?><p class="italic alt-font">
                <?php the_sub_field('rates_optional_text'); ?></p><?php endif; ?>


        </div>

        <?php $count++; endwhile; endif; ?>
    </div>

</section>