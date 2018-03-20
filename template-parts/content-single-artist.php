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
		<section class="row-3">
			<?php $photo = get_field("photo_of_artist"); 
			$bio = get_field("bio"); ?>
			<?php if($photo):?>
				<img class="artist" src="<?php echo $photo['url'];?>" alt="<?php echo $photo['alt'];?>">	
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
				<?php foreach($gallery as $image):?>
					<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
				<?php endforeach;?>
			<?php endif;?>
		</section><!--row-5-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
