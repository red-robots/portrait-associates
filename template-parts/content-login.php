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
								$link_or_form = $row['link_or_form'];
								$link = $row['link'];
								$link_title = $row['link_title'];
								$form = $row['form'];
								if($link_or_form):
									if(strcmp($link_or_form,'form')==0&&$form):?>
										<li><a href="<?php echo $form['url'];?>" target="_blank"><?php echo $form['title'];?></a></li>
									<?php elseif(strcmp($link_or_form,'link')==0&&$link&&$link_title):?>
										<li><a href="<?php echo $link;?>" target="_blank"><?php echo $link_title;?></a></li>
									<?php endif;
								endif;?>
							<?php endforeach;?>
						</ul>
					<?php endif;
				else:
					the_content();
				endif;?>
			</section><!--.copy-->
			<section class="artists-links">
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

						
					<section class="table">
						<div class="heading cell">Artist Name</div>
						<div class="heading cell">Bio</div>
						<div class="heading cell">Price List</div>
						<div class="heading cell">Important Commissions</div>
						<div class="heading cell">Portrait Images</div>
						
						<?php while($query->have_posts()):$query->the_post();
							$artistName = get_the_title();
							$result = explode(" ",$artistName);
						?>
							<div class="cell name">
								<a target="_blank" href="<?php echo add_query_arg('type','showall',get_permalink()); ?>">
									<?php //echo $result[0].' '.$result[1]; ?>
									<?php echo $artistName; ?>
								</a>
							</div>
							<div class="cell">
								<a target="_blank" href="<?php echo add_query_arg('type','bio',get_permalink()); ?>">
									Bio
								</a>
							</div>
							<div class="cell">
								<a target="_blank" href="<?php echo add_query_arg('type','pricing',get_permalink()); ?>">
									Price List
								</a>
							</div>
							<div class="cell">
								<a target="_blank" href="<?php echo add_query_arg('type','commissions',get_permalink()); ?>">
									Important Commissions
								</a>
							</div>
							<div class="cell">
								<a target="_blank" href="<?php echo add_query_arg('type','samples',get_permalink()); ?>">
									Portrait Images
								</a>
							</div>

						<?php endwhile; ?>
					</section>
					<?php endif; ?>

				<?php endif;?>
			</section>
		</div><!--.inner-wrapper-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
