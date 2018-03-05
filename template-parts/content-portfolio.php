<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-portfolio"); ?>>
	<div class="wrapper">
		<div class="row-3">
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
								<li <?php if(3 === $term->term_id) echo 'class="active"'; //if family?>>
									<div class="top">
										<?php echo $term->name;?>
									</div>
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
				<?php $args = array(
					'post_type'=>'portfolio',
					'orderby'=>'menu_order',
					'order'=>'ASC',
					'posts_per_page'=>10
				);
				$query = new WP_Query($args);
				$wp_query_holder = $wp_query;
				$wp_query = $query;
				get_template_part( 'template-parts/content', 'portraits' );
				$wp_query = $wp_query_holder;
				wp_reset_postdata();?>
			</div><!--.col-2-->
		</div><!--.row-3-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
