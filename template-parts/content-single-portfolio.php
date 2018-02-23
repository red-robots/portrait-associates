<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single-portfolio"); ?>>
	<div class="wrapper">
		<?php $current_terms = get_the_terms($post,'portrait_type');
		$current_term = null;
		if(!is_wp_error($current_terms)&&is_array($current_terms)&&!empty($current_terms)):
			//find first term that isn't a root term
			foreach($current_terms as $term):
				if($term->parent!==0):
					$current_term = $term;
					break;
				endif;
			endforeach;
		endif;?>
		<div class="row-3 clear-bottom">
			<div class="col-1">
				<?php //get top level terms
				$args = array(
					'taxonomy'=>'portrait_type',
					'parent'=>0
				);
				$terms = get_terms($args);
				if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
					<nav class="cat-menu">
						<ul>
							<?php //show all terms for parent
							foreach($terms as $term):?>
								<li <?php if($current_term!==null&&$current_term->parent === $term->term_id) echo 'class="active"';?>>
									<div class="top">
										<?php echo $term->name;?>
									<div>
									<?php //get current term and siblings by current term parent
									$sub_args = array(
										'taxonomy'=>'portrait_type',
										'parent'=>$term->term_id
									);
									$sub_terms = get_terms($sub_args);
									if(!is_wp_error($sub_terms)&&is_array($sub_terms)&&!empty($sub_terms)):?>
										<ul class="sub-menu">
											<li>
												<a href="<?php echo get_term_link($term);?>" >
													All <?php echo $term->name;?>
												</a>
											</li>
											<?php //show all terms
											foreach($sub_terms as $sub_term):?>
												<li>
													<a href="<?php echo get_term_link($sub_term);?>"><?php echo $sub_term->name;?></a>
												</li>
											<?php endforeach;?>
										</ul><!--.sub-menu-->
									<?php endif;?>
								</li>
							<?php endforeach;?>
						</ul>
					</nav><!--.cat-menu-->
				<?php endif;?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php $query = null; //set to null for second query check
				if($current_term):
					$args = array(
						'post_type'=>'portfolio',
						'orderby'=>'RAND',
						'order'=>'ASC',
						'posts_per_page'=>-1,
						'tax_query'=>array(array(
							'taxonomy'=>'portrait_type',
							'field'=>'term_id',
							'terms'=>$current_term->term_id
						))
					);
					$query = new WP_Query($args);
					$first_query = clone $query;
					if($first_query->have_posts()):?>
						<div class="flexslider">
							<ul class="slides">
								<?php $i=0;
								while($first_query->have_posts()): $first_query->the_post();?>
									<?php $image = get_field("image");
									$medium = get_field("medium");
									$size = get_field("size");
									if($image):?>
										<li>	
											<img class="<?php if($i!==0&&$i!==1) echo 'lazy';?>" <?php if($i!==0&&$i!==1) echo 'data-';?>src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
											<?php if($size||$medium):?>
												<div class="description">
													<?php if($medium):?>
														<div class="medium">
															<?php echo $medium;?>
														</div><!--.medium-->
													<?php endif;?>
													<?php if($size):?>
														<div class="size">
															<?php echo $size;?>
														</div><!--.medium-->
													<?php endif;?>
												</div><!--.description-->
											<?php endif;?>
										</li>
									<?php $i++;
									endif;?>
								<?php endwhile;?>
							</ul><!--.slides-->
						</div><!--.flexslider-->
					<?php endif;?>
				<?php endif;?>
			</div><!--.col-2-->
			<div class="col-3">
				<?php if($query):
					$wp_query_holder = $wp_query;
					$wp_query = $query;
					get_template_part( 'template-parts/content', 'single-portraits' );
					$wp_query = $wp_query_holder;
					wp_reset_postdata();
				endif;?>
			</div><!--.col-3-->
		</div><!--.row-3-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
