<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

	<footer id="colophon" class="site-footer">
	<div class="logo">
		<?php
	wp_nav_menu(array('menu' => 'Footer Menu', 'theme_location' => 'footer'));
	?>
	</div>
		<div class="site-info">

			<?php if (function_exists ('get_field')) {
				if (get_field( "logo" ) )
				echo wp_get_attachment_image( get_field( "logo" ) );
				}
			?>

			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'school-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'school-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'school-theme' ), 'school-theme', '<a href="https://ariellemarin.com/school/">Arielle Marin & Nando Hospina</a>' );
				?>
		</div><!-- .site-info -->

		<div class="footer-menu">		

			<nav id="footer-navigation" class="footer-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
				
		</div><!-- .footer-menus -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
