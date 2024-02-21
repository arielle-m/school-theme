<?php

// https://www.advancedcustomfields.com/resources/repeater/

get_header();
?>


<main id="primary" class="site-main">

    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>

                <?php
                // Check if the repeater field has rows
                if (have_rows('repeater_field_name')) :
                    // Loop through rows
                    while (have_rows('repeater_field_name')) : the_row();
                        // Get sub field values
                        $day = get_sub_field('day');
                        $time = get_sub_field('time');
                        $activity = get_sub_field('activity');
                        // Output sub field values
                        ?>
                        <div class="schedule-item">
                            <h3><?php echo esc_html($day); ?> - <?php echo esc_html($time); ?></h3>
                            <p><?php echo esc_html($activity); ?></p>
                        </div>
                    <?php
                    endwhile;
                else :
                    // No rows found
                    echo 'No schedule available.';
                endif;
                ?>
            </div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->
    <?php endwhile; ?>

</main><!-- #primary -->

<?php
get_footer();


