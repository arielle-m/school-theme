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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php single_term_title(); esc_html_e(' Students', 'school-theme'); ?></h1>
				<p><?php the_archive_description(); ?></p>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>

				<article>
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
					</a>
					<?php the_post_thumbnail( 
						'portrait-student',
					 	array( 'class' => 'alignleft')); ?>
					<p><?php the_content(); ?></p>
				</article>
				
				<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
