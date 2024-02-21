<?php
		$args = array(
			'post_type'			=> 'school-staff',
			'posts_per_page'	=> -1,
			'orderby'			=> 'title',
			'order'				=> 'ASC',
			// 'tax_query'			=> array(
			// 	array(
			// 		'taxonomy' 	=> 'school-student-category',
			// 		'field'		=> 'slug',
			// 		'terms'		=> array( 'designer', 'developer' ),
			// 	)
			// )
		);
		$query = new WP_Query( $args );
		if ( $query -> have_posts() ) :
			?>
			<section class="students">
			<?php
				while ( $query -> have_posts() ) :
					$query -> the_post();
			?>
				<article class="student-item">
					<h2>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<?php the_post_thumbnail( 'medium' ); ?>
					<?php the_excerpt(); ?>
					<p>Specialty: <?php echo get_the_term_list( get_the_ID(), 'school-student-category' ); ?></p>
				</article>
			<?php
				endwhile;
				wp_reset_postdata();
			?>
			</section>
			<?php
		endif;



		<?php
if ( function_exists( 'get_field' ) ) {
    if ( get_field( 'bio' ) ) {
        the_field( 'bio' );
    }
	if ( get_field( 'courses' ) ) {
		the_field( 'courses' );
	}
	if ( get_field( 'website' ) ) {
		the_field( 'website' );
	}
}
?>