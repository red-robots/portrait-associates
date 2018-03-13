<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>

	<div id="primary">
		<main id="main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'sitemap' );
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
