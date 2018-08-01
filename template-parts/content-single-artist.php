<?php
/**
 * Template part for displaying page content in single-artist.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
if(isset( $_GET['type'] )) {
	$type = $_GET['type'];
} else {
	$type = 'showall';
}
$gallery = get_field("gallery_of_work");

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single-artist"); ?>>
	<div class="wrapper">

		<?php if($type != 'all') { ?>
			<div class="print-logo">
				<img src="<?php bloginfo('template_url'); ?>/images/logo-print.jpg">
			</div>
		<?php } ?>


		<header class="row-1">
			<h1><?php the_title();?></h1>
		</header><!--.row-1-->


		<!-- 

			======== Bio ========

		 -->
		<?php if($type == 'bio' || $type == 'showall'):?>
			
			<section class="row-3">
				
				<?php $photo = get_field("photo_of_artist"); 
				$bio = get_field("bio"); ?>
				<?php if($photo):?>
					<img class="artist" src="<?php echo $photo['url'];?>" alt="<?php echo $photo['alt'];?>">
					<br>	
				<?php endif;?>
				<!-- <a class="button" href="<?php echo add_query_arg('pricing','true',get_permalink());?>">Pricing</a> -->
				<?php if($bio):?>
					<header>
						<h2>Bio</h2>
					</header>
					<div class="copy">
						<?php echo $bio;?>
					</div><!--.copy--> 	
				<?php endif;?>
			</section><!--.row-3-->
		<?php endif;?>


		<!-- 

			======== Pricing ========

		 -->

		<?php if($type == 'pricing' || $type == 'showall'):?>
		<section class="row-4">
			
			<?php $medium = get_field("medium");
			if($medium):?>
				<?php foreach($medium as $row):
					$title = $row['title'];
					$col_1_title = $row['column_1_title'];
					$col_2_title = $row['column_2_title'];
					$medtype = $row['type'];
					$desc = $row['medium_pricing_description'];?>
					<div class="medium">
						<?php if($title):?>
							<header>
								<h2><?php echo $title;?></h2>
							</header>
						<?php endif;?>
						<?php if($medtype):?>
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
									<?php foreach($medtype as $t):
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
				<?php $procedure = get_field("procedure");
				if($procedure):?>
					<header>
						<h2>Procedure</h2>
					</header>
					<div class="copy">
						<?php echo $procedure;?>
					</div><!--.copy--> 	
				<?php endif;?> 	
			<?php endif;?>
		<?php endif; ?>
			<!-- 

			======== Notiable commissions ========

		 -->


			<?php if($type == 'commissions' || $type == 'showall'):?>
				
				<?php $notable_commissions = get_field("notable_commissions");
				if($notable_commissions):?>
					<header>
						<h2>Notable Commissions</h2>
					</header>
					<div class="copy">
						<?php echo $notable_commissions;?>
					</div><!--.copy--> 	
				<?php endif;?> 	
			<?php endif;?>

		</section><!--.row-4-->

		<!-- 

			======== Gallery ========

		 -->


		<?php if($type == 'samples' || $type == 'showall') : ?>
			<section class="row-5">
				<?php if($type != 'all') { ?>
				<?php echo do_shortcode('[bws_pdfprint]'); ?>
					<div class="print-logo">
						<img src="<?php bloginfo('template_url'); ?>/images/logo-print.jpg">
					</div>
				<?php } ?>
				<?php //$gallery = get_field("gallery_of_work");?> 
				<?php if($gallery):?>
					<?php foreach($gallery as $image):?>
						<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
					<?php endforeach;?>
				<?php endif;?>
			</section><!--row-5-->
		<?php endif;?>

		<?php
// echo '<pre>';
// print_r($type);
// echo '</pre>';
// 		echo $type;
// 		if($type == 'all') {
// 			echo 'woeih';
// 		}
?>



	</div><!--.wrapper-->
</article><!-- #post-## -->
