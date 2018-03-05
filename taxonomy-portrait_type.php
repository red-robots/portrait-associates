<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="">
		<main id="main" class="site-main template-portfolio" role="main">
			<div class="wrapper">
				<div class="row-3">
					<div class="col-1">
						<?php //get top level terms
						$current_term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy'));
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
						<?php get_template_part( 'template-parts/content', 'portraits' );
						wp_reset_postdata();?>
					</div><!--.col-2-->
				</div><!--.row-3-->
			</div><!--.wrapper-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
