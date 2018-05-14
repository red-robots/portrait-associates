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
			<?php $medium = get_field("medium");
			if($medium):?>
				<?php foreach($medium as $row):
					$title = $row['title'];
					$col_1_title = $row['column_1_title'];
					$col_2_title = $row['column_2_title'];
					$type = $row['type'];
					$desc = $row['medium_pricing_description'];?>
					<div class="medium">
						<?php if($title):?>
							<header>
								<h2><?php echo $title;?></h2>
							</header>
						<?php endif;?>
						<?php if($type):?>
							<table>
								<?php if($col_1_title||$col_2_title):?>
									<thead>
										<tr>
											<th></th>
											<th>
												<?php if($col_1_title):?>
													<?php echo $col_1_title;?>		
												<?php endif;?>
											</th>
											<th>
												<?php if($col_2_title):?>
													<?php echo $col_2_title;?>
												<?php endif;?>
											</th>
										</tr>
									</thead>
								<?php endif;?>
								<tbody>
									<?php foreach($type as $t):
										$subject = $t['subject'];
										$price_1 = $t['price_one'];
										$price_2 = $t['price_two'];?>
										<tr>
											<td>
												<?php if($subject):?>
													<?php echo $subject;?>
												<?php endif;?>
											</td>
											<?php if($col_1_title||$price_1):?>
												<td><?php echo $price_1;?></td>
											<?php endif;?>
											<?php if($col_2_title||$price_2):?>
												<td><?php echo $price_2;?></td>
											<?php endif;?>
										</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						<?php endif;?>
						<?php if($desc):?>
							<div class="copy">
								<?php echo $desc;?>
							</div><!--.copy--> 	
						<?php endif;?> 	
					</div><!--.medium-->
				<?php endforeach;?>
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
