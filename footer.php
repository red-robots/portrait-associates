<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="wrapper">
				<div class="row-1">
					<?php $facebook = get_field("facebook_link","option");
					$instagram = get_field("instagram_link","option");
					if($facebook):?>
						<a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a>
					<?php endif;?>
					<?php if($instagram):?>
						<a href="<?php echo $instagram;?>"><i class="fa fa-instagram"></i></a>
					<?php endif;?>
				</div><!--.row-1-->
				<div class="row-2">
					<div class="col-1">
						<nav class="footer">
							<?php wp_nav_menu( array( 'theme_location' => 'footer', ) ); ?>
						</nav><!--.footer-->
					</div><!--.col-1-->
					<div class="col-2">
						<?php $copyright = get_field("copyright","option");
						$associate_button_text = get_field("associate_button_text","option");
						$associate_button_link = get_field("associate_button_link","option");
						if($associate_button_link&&$associate_button_text):?>
							<div class="associate-button">
								<a href="<?php echo $associate_button_link;?>"><?php echo $associate_button_text;?></a>
							</div><!--.associate-button-->
						<?php endif;
						if($copyright):?>
							<div class="copyright">
								<?php echo $copyright;?>
							</div><!--.copyright-->
						<?php endif;?>
						<nav class="sitemapbw">
							<?php wp_nav_menu( array( 'theme_location' => 'sitemapbw' ) ); ?>
						</nav><!--.sitemapbw-->
					</div><!--.col-2-->
				</div><!--.row-2-->
			</div><!-- wrapper -->
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
