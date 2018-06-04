<?php
/**
 * Template part for displaying page content in page-contact.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-page"); ?>>
	<div class="wrapper">
		<header>
			<h1><?php the_title();?></h1>
		</header>
		<?php if ( ! post_password_required() ) :
			$args = array(
				'post_type'=>'artist',
				'posts_per_page'=>-1,
				'orderby'=>'menu_order',
				'order'=>'ASC'
			);
			$query = new WP_Query($args);
			if($query->have_posts()):?>
				<section class="copy">
					<?php while($query->have_posts()):$query->the_post();?>
						<h2><?php the_title();?></h2>
						<ul>
							<?php $address = get_field("address");
							$shipping_address = get_field("shipping_address");
							$home_phone = get_field("home_phone");
							$cell_phone = get_field("cell_phone");
							$studio_phone = get_field("studio_phone");
							$fax = get_field("fax");
							$email = get_field("email");
							$alternate_email = get_field("alternate_email");
							if($address):?>
								<li>Address:<br><?php echo $address;?></li>
							<?php endif;
							if($shipping_address):?>
								<li>Shipping Address:<br><?php echo $shipping_address;?></li>
							<?php endif;
							if($home_phone):?>
								<li>Home Phone: <?php echo $home_phone;?></li>
							<?php endif;
							if($cell_phone):?>
								<li>Cell Phone: <?php echo $cell_phone;?></li>
							<?php endif;
							if($studio_phone):?>
								<li>Studio Phone: <?php echo $studio_phone;?></li>
							<?php endif;
							if($fax):?>
								<li>Fax: <?php echo $fax;?></li>
							<?php endif;
							if($email):?>
								<li>Email: <?php echo $email;?></li>
							<?php endif;
							if($alternate_email):?>
								<li>Alternate Email: <?php echo $alternate_email;?></li>
							<?php endif;?>
						</ul>
					<?php endwhile;?>
				</section><!--.copy-->
				<?php wp_reset_postdata();
			endif;?>
		<?php else:
			the_content();
		endif;?>	
	</div><!--.wrapper-->
</article><!-- #post-## -->
