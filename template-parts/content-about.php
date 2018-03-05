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
			<?php $team_title = get_field("team_title");
			$read_more_text = get_field("read_more_text");
			if($team_title):?>
				<header>
					<h2><?php echo $team_title;?></h2>
				</header>
			<?php endif;
			$args = array(
				'post_per_page'=>-1,
				'post_type'=>'team'
			);
			$query = new WP_Query($args);
			if($query->have_posts()):?>
				<div class="team clear-bottom">
					<?php while($query->have_posts()): $query->the_post();
						$image = get_field("image");
						$email = get_field("email");?>
						<div class="member js-blocks">
							<?php if($image):?>
								<img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
							<?php endif;?>
							<header>
								<h3><?php the_title();?></h3>
							</header>
							<div class="spacer"></div>
							<?php if($email):?>
								<div class="email">
									<?php echo $email;?>
								</div><!--.email-->
							<?php endif;
							if($read_more_text):?>
								<a class="button" href="<?php the_permalink();?>">
									<?php echo $read_more_text;?>
								</a>
							<?php endif;?>
						</div><!--.member-->
					<?php endwhile;?>
				</div><!--.team-->
			<?php endif;?>
		</div><!--.wrapper-->
	</div><!--.row-3-->
</article><!-- #post-## -->
