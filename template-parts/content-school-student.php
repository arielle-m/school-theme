<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

?>

<article data-aos="fade-up" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		$student_name = get_the_title();

		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	
	<div class="entry-content">
		<?php
			the_post_thumbnail( 
				'post-thumbnail',
				 array( 'class' => 'alignright'));
			the_content();
		?>
	</div><!-- .entry-content -->

	<?php
		$terms_obj = get_the_terms( get_the_ID(), 'school-student-category' );

		$terms = $terms_obj[0]->slug;

		if ( $terms_obj && ! is_wp_error ( $terms_obj ) ) :
			foreach ( $terms_obj as $term ) :
				$args = array(
					'post_type'			=> 'school-student',
					'posts_per_page'	=> -1,
					'tax_query'			=> array(
						array(
							'taxonomy' 	=> 'school-student-category',
							'field'		=> 'slug',
							'terms'		=> $term->slug,
						),
					),
					'post__not_in'		=> array( get_the_ID() ),
				);

				$query = new WP_Query( $args );

				if ( $query -> have_posts() ) :
					?>
					<aside class="related-students">
						<h3>
							<?php esc_html_e( 'Meet other ' .$term->name . ' students:' , 'school-theme' );	?>
						</h3>
					<?php
					while ( $query -> have_posts() ) {
						$query -> the_post();
						?>
					
						<p>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</p>
		
						<?php
					}
					wp_reset_postdata();
					?>
					</aside>
					<?php
				endif;
			endforeach;
		endif;
	?>

	<footer class="entry-footer">
		<?php school_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
