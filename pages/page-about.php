<?php
/**
 * Template Name: About
 */

get_header(); ?>

	<div id="primary">
		<main id="main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'about' );
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
