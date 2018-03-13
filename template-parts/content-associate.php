<?php
/**
 * Template part for displaying page content in page-associate.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-associate"); ?>>
	<div class="row-1">
		<div class="wrapper clear-bottom">
			<header class="row-1">
				<h1><?php the_title();?></h1>
				<?php the_content();?>
			</header>
			<?php if ( ! post_password_required() ):?>
				<?php $documents = get_field("documents");
				$documents_title = get_field("documents_title");?>
				<section class="row-2">
					<?php if($documents):?>
						<div class="col-1 copy">
							<?php if($documents_title):?>
								<header>
									<h2><?php echo $documents_title;?></h2>
								</header>
							<?php endif;?>
							<ul>
								<?php foreach($documents as $document):
									$document = $document['document'];
									if($document):?>
										<li>
											<a href="<?php echo $document['url'];?>">
												<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<?php echo $document['title'];?>
											</a>	
										</li>
									<?php endif;
								endforeach;?>
							</ul>
						</div><!--.col-1-->
					<?php endif;
					$args = array(
						'post_type'=>'artist',
						'posts_per_page'=>-1,
						'orderby'=>'title',
						'order'=>'ASC'
					);
					$query = new WP_Query($args);
					$artists_title = get_field("artists_title");
					if($query->have_posts()):?>
						<div class="col-2 copy">
							<?php if($artists_title):?>
								<header>
									<h2><?php echo $artists_title;?></h2>
								</header>
							<?php endif;?>
							<ul>
								<?php while($query->have_posts()):$query->the_post();?>
									<li>
										<a href="<?php the_permalink();?>">
											<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<?php the_title();?>
										</a>
									</li>	
								<?php endwhile;?>
							</ul>
						</div><!--.col-2-->
						<?php wp_reset_postdata();
					endif;?>
				</section><!--.row-2-->
			<?php endif;?>
		</div><!--.wrapper-->
	</div><!--.row-1-->
</article><!-- #post-## -->
