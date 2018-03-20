<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
global $bella_url;
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
				<?php $filter_terms = null;
				$queried_object = get_queried_object();
				if(isset($_GET['filter'])):
					$filter_terms = explode(",",str_replace("%2C",",",$_GET['filter']));
				endif;?>
				<?php $bella_url = is_a($queried_object,'WP_Term') ? get_term_link($queried_object) : get_the_permalink();
				get_template_part( 'template-parts/content', 'filter-terms' );?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php $args = array(
					'posts_per_page'=>-1,
					'post_type'=>'portfolio',
					'orderby'=>'rand',
					'order'=>'ASC'
				);
				$tax_params = array(
					'relation' => 'AND',
				);
				$taxes = array();
				if($filter_terms):
					foreach($filter_terms as $term):
						$split = explode(";",$term);
						if(count($split)===2):
							$taxes[$split[0]][] = $split[1];    
						endif;
					endforeach;
				endif;
				foreach($taxes as $key=>$value):
					$tax_params[] = array(
						'taxonomy'=>$key,
						'field'=>'term_id',
						'terms'=>$value,
					);
				endforeach;
				if(is_a($queried_object,'WP_Term')):
					$tax_params[] = array(
						'taxonomy'=>'portrait_type',
						'field'=>'slug',
						'terms'=>get_query_var( 'term' )
					);
				endif;
				if(count($tax_params)>1):
					$args['tax_query'] = $tax_params;
				endif;
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
