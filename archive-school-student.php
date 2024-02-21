<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<header class="page-header">
			<h1 class="page-title"><?php post_type_archive_title(); ?></h1>
			<p><?php the_archive_description(); ?></p>
			<?php
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<?php
		$args = array(
			'post_type'			=> 'school-student',
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
			

		
		?>

	</main><!-- #main -->

<?php
get_footer();
