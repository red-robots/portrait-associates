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
		<?php $args = array(
			'taxonomy'=>'portrait_type',
			'parent'=>0
		);
		$terms = get_terms($args);
		if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
			<nav class="row-1">
				<?php $i = 0;
				foreach($terms as $term):?>
					<a href="<?php echo get_term_link($term);?>" <?php if($i == 0) echo 'class="active"';?>><?php echo $term->name;?></a>
					<?php $i++; 
				endforeach;?>
			</nav><!--.row-1-->
			<?php $sub_args = array(
				'taxonomy'=>'portrait_type',
				'parent'=>$terms[0]->term_id
			);
			$sub_terms = get_terms($sub_args);
			if(!is_wp_error($sub_terms)&&is_array($sub_terms)&&!empty($sub_terms)):?>
				<nav class="row-2">
					<?php foreach($sub_terms as $term):?>
						<a href="<?php echo get_term_link($term);?>"><?php echo $term->name;?></a>
					<?php endforeach;?>
				</nav><!--.row-2-->
			<?php endif;
		endif;?>
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
	</div><!--.wrapper-->
</article><!-- #post-## -->
