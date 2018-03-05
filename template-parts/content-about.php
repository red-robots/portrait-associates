<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-about"); ?>>
	<div class="row-1">
		<div class="wrapper">
			<header>
				<h1><?php the_title();?></h1>
			</header>
			<div class="copy">
				<?php the_content();?>
			</div><!--.copy-->
		</div><!--.wrapper-->
	</div><!--.row-1-->
	<?php $what_we_do_copy = get_field("what_we_do_copy");
	$callout_copy = get_field("callout_copy");
	if($what_we_do_copy||$callout_copy):?>
		<div class="row-2">
			<div class="wrapper clear-bottom">
				<?php if($what_we_do_copy):?>
					<div class="col-1 copy">
						<?php echo $what_we_do_copy;?>
					</div><!--.col-1-->
				<?php endif;
				if($callout_copy):?>
					<div class="col-2 copy">
						<?php echo $callout_copy;?>
					</div><!--.col-2-->
				<?php endif;?>
			</div><!--.wrapper-->
		</div><!--.row-2-->
	<?php endif;?>
	<div class="row-3">
		<div class="wrapper">
		</div><!--.wrapper-->
	</div><!--.row-3-->
</article><!-- #post-## -->
