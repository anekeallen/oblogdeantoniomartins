<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Default_Mag
 */

get_header();
?>

	<section class="error-404 not-found twp-not-found twp-min-height">
		<div class="twp-wrapper">
			<header class="page-header">
				<div class="twp-error-title twp-secondary-color">404...</div>
				<h1><?php esc_html_e( 'Ops! Essa página não pode ser encontrada.', 'default-mag' ); ?></h2>
			</header><!-- .page-header -->
			<div class="page-content">
				<p><?php esc_html_e( 'Parece que nada foi encontrado neste local. Talvez tente um dos links abaixo ou uma pesquisa?', 'default-mag' ); ?></p>
	
				<?php get_search_form(); ?>
			</div>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

<?php
get_footer();
