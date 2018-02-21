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
				<?php $current_term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy'));
				$args = array(
					'taxonomy'=>'portrait_type',
					'parent'=>0
				);
				$terms = get_terms($args);
				if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
					<nav class="row-1">
						<?php foreach($terms as $term):?>
							<a href="<?php echo get_term_link($term);?>" <?php if($current_term->parent === $term->term_id) echo 'class="active"';?>>
								<?php echo $term->name;?>
							</a>
						<?php endforeach;?>
					</nav><!--.row-1-->
					<?php $sub_args = array(
						'taxonomy'=>'portrait_type',
						'parent'=>$current_term->parent
					);
					if($current_term->parent===0):
						$sub_args['parent']=$current_term->term_id;
					endif;
					$sub_terms = get_terms($sub_args);
					if(!is_wp_error($sub_terms)&&is_array($sub_terms)&&!empty($sub_terms)):?>
						<nav class="row-2">
							<?php foreach($sub_terms as $term):?>
								<a href="<?php echo get_term_link($term);?>"><?php echo $term->name;?></a>
							<?php endforeach;?>
						</nav><!--.row-2-->
					<?php endif;
				endif;
				get_template_part( 'template-parts/content', 'portraits' );
				wp_reset_postdata();?>
			</div><!--.wrapper-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
