<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-process"); ?>>
	<div class="row-1">
		<div class="wrapper">
			<header>
				<h1><?php the_title();?></h1>
			</header>
			<div class="copy">
				<?php the_content();?>
			</div><!--.copy-->
		</div><!--.wrapper-->
	</div><!--.row-1-->
	<?php $process = get_field("process");
	if($process&&count($process)>0):?>
		<div class="row-2">
			<div class="wrapper clear-bottom">
				<div class="col-1">
					<ul>
						<?php foreach($process as $row):
							if($row['title']&&$row['copy']):?>
								<li>
									<a href="#<?php echo preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($row['title']));?>">
										<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<?php echo $row['title'];?>
									</a>
								</li>
							<?php endif;?>
						<?php endforeach;?>
					</ul>	
				</div><!--.col-1-->
				<div class="col-2">
					<?php foreach($process as $row):?>
						<div class="row">
							<?php if($row['title']&&$row['copy']):?>
								<a name="<?php echo preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($row['title']));?>"></a>
								<header><h2><?php echo $row['title'];?></h2></header>
								<div class="copy">
									<?php echo $row['copy'];?>
								</div><!--.copy-->
							<?php endif;?>
						</div><!--.row-->
					<?php endforeach;?>
				</div><!--.col-2-->
			</div><!--.wrapper-->
		</div><!--.row-2-->
	<?php endif;?>
</article><!-- #post-## -->
