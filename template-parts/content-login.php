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
				<?php if ( ! post_password_required() ) :
					$forms_title = get_field("forms_title");
					$forms = get_field("forms");
					if($forms_title):?>
						<header>
							<h2><?php echo $forms_title;?></h2>
						</header>
					<?php endif;
					if($forms):?>
						<ul>
							<?php foreach($forms as $row):
								if($row['form']):?>
									<li><a href="<?php echo $row['form']['url'];?>"><?php echo $row['form']['title'];?></a></li>
								<?php endif;?>
							<?php endforeach;?>
						</ul>
					<?php endif;
				else:
					the_content();
				endif;?>
			</section><!--.copy-->
			<section class="copy col-2">
				<?php if ( ! post_password_required() ) :
					$artists_title = get_field("artists_title");
					if($artists_title):?>
						<header>
							<h2><?php echo $artists_title;?></h2>
						</header>
					<?php endif;
					$args = array(
						'post_type'=>'artist',
						'posts_per_page'=>-1
					);
					$query = new WP_Query($args);
					if($query->have_posts()):?>
						<ul>
							<?php while($query->have_posts()):$query->the_post();?>
								<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<?php endwhile;?>
						</ul>
					<?php endif;
				endif;?>
			</section>
		</div><!--.inner-wrapper-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
