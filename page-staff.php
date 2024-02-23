<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">


		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>




			<div class="entry-content">
				<?php the_content(); ?>
                
				<?php // Add custom WP_Query() code here...
						$taxonomy = 'school-staff-category';
						$terms    = get_terms(
							array(
								'taxonomy' => $taxonomy
							)
						);
						if($terms && ! is_wp_error($terms) ){
							foreach($terms as $term){
							$args = array(
								'post_type'      => 'school-staff',
								'posts_per_page' => -1,
								'order'          => 'ASC',
								'orderby'        => 'title',
								'tax_query'      => array(
									array(
										'taxonomy' => $taxonomy,
										'field'    => 'slug',
										'terms'    => $term->slug,
									)
								),
							);
							
							$query = new WP_Query( $args );
							
							if ( $query -> have_posts() ) {
								// Output Term name.
								echo '<h2>' . esc_html( $term->name ) . '</h2>';
								echo '<div class="staff-section">';
								
								wp_reset_postdata();
							
								// Output Content.
								while ( $query -> have_posts() ) {
									$query -> the_post();
									?>
									
									<article class="staff">
										<h3><?php the_title(); ?></h3>
										<?php
										// Display custom fields
										if ( function_exists( 'get_field' ) ) {
											$staff_biography = get_field( 'bio' );
											$course = get_field( 'courses' );
											$instructor_website = get_field( 'website' );
											?>
											<?php
											if ( $staff_biography ) {
												echo '<p>' . esc_html( $staff_biography ) . '</p>';
											}
											
											if ( $course ) {
												echo '<p>' . esc_html( $course ) . '</p>';
											}
											if ( $instructor_website ) {
												echo '<p><a href="' . esc_url( $instructor_website ) . '">Instructor Website</a></p>';
											}
										}
										?>
									</article>
									<?php
									
								}
								?>
								</div>
								<?php
								wp_reset_postdata();
							}
						}
					}
				?>
				
			</div>

		</article>


		<?php endwhile; ?>

	</main><!-- #primary -->

<?php
get_footer();
