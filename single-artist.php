<?php
/**
 * The template for displaying all single portfolio posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

if(isset($_GET['pricing'])):
	get_header('simple');
else:
	get_header(); 
endif;?>

	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single-artist' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if(isset($_GET['pricing'])):
	get_footer('simple');
else:
	get_footer(); 
endif;?>
