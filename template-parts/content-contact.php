<?php
/**
 * Template part for displaying page content in page-contact.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-two-col"); ?>>
	<div class="wrapper">
		<header>
			<h1><?php the_title();?></h1>
		</header>
		<div class="inner-wrapper clear-bottom">
			<section class="copy col-1">
				<?php the_content();?>
			</section><!--.copy-->
			<section class="col-2">
				<?php $col_2_copy = get_field("col_2_copy");
				if($col_2_copy) echo $col_2_copy;?>
			</section>
		</div><!--.inner-wrapper-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
