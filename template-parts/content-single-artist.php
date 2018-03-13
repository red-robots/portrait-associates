<?php
/**
 * Template part for displaying page content in single-artist.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single-artist"); ?>>
	<div class="wrapper">
		<header class="row-1">
			<h1><?php the_title();?></h1>
		</header><!--.row-1-->
		<section class="row-2">
			<?php $address = get_field("address"); 
			$shipping_address = get_field("shipping_address");
			$home_phone = get_field("home_phone");
			$cell_phone = get_field("cell_phone");
			$studio_phone = get_field("studio_phone"); 
			$fax = get_field("fax"); 
			$email = get_field("email"); 
			$alternate_email = get_field("alternate_email");?>
			<?php if($address):?>
				<div class="copy">
					Address:&nbsp;<?php echo $address;?>
				</div><!--.copy--> 	
			<?php endif;?>
			<?php if($shipping_address):?>
				<div class="copy">
					Shipping Address:&nbsp;<?php echo $shipping_address;?>
				</div><!--.copy--> 	 	
			<?php endif;?>
			<?php if($home_phone):?>
				<div class="copy">
					Home Phone:&nbsp;<?php echo $home_phone;?>
				</div><!--.copy--> 	 	
			<?php endif;?>
			<?php if($cell_phone):?>
				<div class="copy">
					Cell Phone:&nbsp;<?php echo $cell_phone;?>
				</div><!--.copy--> 	 	
			<?php endif;?>
			<?php if($studio_phone):?>
				<div class="copy">
					Studio Phone:&nbsp;<?php echo $studio_phone;?>
				</div><!--.copy--> 	 	
			<?php endif;?>
			<?php if($fax):?>
				<div class="copy">
					Fax:&nbsp;<?php echo $fax;?>
				</div><!--.copy--> 	 	
			<?php endif;?>
			<?php if($email):?>
				<div class="copy">
					Email:&nbsp;<?php echo $email;?>
				</div><!--.copy--> 	 	
			<?php endif;?>
			<?php if($alternate_email):?>
				<div class="copy">
					Alternate Email:&nbsp;<?php echo $alternate_email;?>
				</div><!--.copy--> 		 	
			<?php endif;?>
		</section><!--.row-2-->
		<section class="row-3">
			<?php $photo = get_field("photo_of_artist"); 
			$bio = get_field("bio"); ?>
			<?php if($photo):?>
				<img src="<?php echo $photo['url'];?>" alt="<?php echo $photo['alt'];?>">	
			<?php endif;?>
			<?php if($bio):?>
				<header>
					<h2>Bio</h2>
				</header>
				<div class="copy">
					<?php echo $bio;?>
				</div><!--.copy--> 	
			<?php endif;?>
		</section><!--.row-3-->
		<section class="row-4">
			<?php $medium = get_field("medium");// -> title -> type -> subject + price 
			$pricing = get_field("pricing_description");?>
			<?php if($medium):?>
				<div class="medium">
					<?php foreach($medium as $row):?>
						<?php if($row['title']):?>
							<header>
								<h2><?php echo $row['title'];?></h2>
							</header>
						<?php endif;?>
						<?php if($row['type']):?>
							<?php foreach($row['type'] as $type):?>
								<?php if($type['subject']&&$type['price']):?>
									<div class="row clear-bottom">
										<div class="subject">
											<?php echo $type['subject'];?>
										</div><!--.subject-->
										<div class="price">
											<?php echo $type['price'];?>
										</div><!--.price-->
									</div><!--.row-->
								<?php endif;?>
							<?php endforeach;?>
						<?php endif;?>
					<?php endforeach;?>
				</div><!--.copy--> 	
			<?php endif;?>
			<?php if($pricing):?>
				<div class="copy">
					<?php echo $pricing;?>
				</div><!--.copy--> 	
			<?php endif;?>
		</section><!--.row-4-->
		<section class="row-5">
			<?php $gallery = get_field("gallery_of_work");?> 
			<?php if($gallery):?>
				<header>
					<h2>Gallery</h2>
				</header>
				<?php foreach($gallery as $image):?>
					<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
				<?php endforeach;?>
			<?php endif;?>
		</section><!--row-5-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
