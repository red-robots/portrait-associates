<?php
/**
 * Template Name: Process
 */

get_header(); ?>

	<div id="primary">
		<main id="main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'process' );
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
