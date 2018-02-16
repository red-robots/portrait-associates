<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 


// pull the homepage stuff
$post = get_post(17); 
setup_postdata( $post );
 
	$banner = get_field('banner_image');
	$bannerLink = get_field('banner_link');
	$desc = get_bloginfo('description');
	$portrait_type_picker = get_field("portrait_type_picker");
 
wp_reset_postdata();

?>


<section class="hero">
	<div class="hero-banner">
		<?php if( $bannerLink != '') { ?><a href="<?php echo $bannerLink; ?>"><?php } ?>
			<img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>">
		<?php if( $bannerLink != '') { ?></a><?php } ?>
	</div>
	<h2 class="section-title"><?php echo $desc; ?></h2>


<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo">
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
      <feComposite in="SourceGraphic" in2="goo"/>
    </filter>
  </defs>
</svg>

<span class="button--bubble__container">
  <a href="<?php bloginfo('url'); ?>/locate-a-sales-associate" class="button button--bubble">
    LOCATE A SALES ASSOCIATE
  </a>
  <span class="button--bubble__effect-container">
    <span class="circle top-left"></span>
    <span class="circle top-left"></span>
    <span class="circle top-left"></span>

    <span class="button effect-button"></span>

    <span class="circle bottom-right"></span>
    <span class="circle bottom-right"></span>
    <span class="circle bottom-right"></span>
  </span>
</span>




</section>


<section class="how-it-works">
	<div class="wrapper">
		<h2 class="section-title">How it Works</h2>
		<div class="steps">
			<div class="step">
				<div class="circle-wrap">
					<div class="circle">1</div>
				</div>
				<div class="sdesc">Initial Consultation and Artist Selection</div>
			</div>
			<div class="step">
				<div class="circle-wrap">
					<div class="circle">2</div>
				</div>
				<div class="sdesc">First Sitting</div>
			</div>
			<div class="step">
				<div class="circle-wrap">
					<div class="circle">3</div>
				</div>
				<div class="sdesc">Development of the Portrait</div>
			</div>
			<div class="step">
				<div class="circle-wrap">
					<div class="circle">4</div>
				</div>
				<div class="sdesc">Delivery</div>
			</div>
		</div>
		<div class="stepline"></div>

		<div class="separator"></div>

		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo">
		  <defs>
		    <filter id="goo">
		      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
		      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
		      <feComposite in="SourceGraphic" in2="goo"/>
		    </filter>
		  </defs>
		</svg>

		<span class="button--bubble__container">
		  <a href="<?php bloginfo('url'); ?>/process" class="button button--bubble">
		    LEARN MORE
		  </a>
		  <span class="button--bubble__effect-container">
		    <span class="circle top-left"></span>
		    <span class="circle top-left"></span>
		    <span class="circle top-left"></span>

		    <span class="button effect-button"></span>

		    <span class="circle bottom-right"></span>
		    <span class="circle bottom-right"></span>
		    <span class="circle bottom-right"></span>
		  </span>
		</span>


	</div>
</section>


<section class="portrait-types">
	<div class="wrapper">
		<h2 class="section-title">PORTRAIT TYPES</h2>
		<?php if($portrait_type_picker):
			$terms = get_terms( array( 
				'taxonomy' => 'portrait_type',
				'term_taxonomy_id'=>$portrait_type_picker
			) );
			if($terms):?>
				<div class="home-portrait-wrapper">
					<?php $i = 0;
					foreach ( $terms as $term ) :
						if($term): 
							$image = get_field( 'image', 'portrait_type_' . $term->term_id );
							$link = get_term_link($term);
							if($image && $link):?>
								<div class="home portrait js-blocks <?php if($i%5==0) echo "first";?> <?php if(($i+1)%5==0) echo "last";?>">
									<a href="<?php echo $link; ?>">
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $term->name; ?>">
										<div class="title-box">
											<header>
												<h2><?php echo $term->name; ?></h2>
											</header>
										</div>
									</a>
								</div>			
								<?php $i++;
							endif;
						endif;
					endforeach;?>
				</div><!--.boxes-wrapper-->
			<?php endif;
		endif;?>

		<h2 class="section-title">NEED HELP DECIDING?</h2>
		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo">
		  <defs>
		    <filter id="goo">
		      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
		      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
		      <feComposite in="SourceGraphic" in2="goo"/>
		    </filter>
		  </defs>
		</svg>

		<span class="button--bubble__container">
		  <a href="<?php bloginfo('url'); ?>/locate-a-sales-associate" class="button button--bubble">
		    LOCATE A SALES ASSOCIATE
		  </a>
		  <span class="button--bubble__effect-container">
		    <span class="circle top-left"></span>
		    <span class="circle top-left"></span>
		    <span class="circle top-left"></span>

		    <span class="button effect-button"></span>

		    <span class="circle bottom-right"></span>
		    <span class="circle bottom-right"></span>
		    <span class="circle bottom-right"></span>
		  </span>
		</span>


	</div>
</section>

<section class="blue">
	<h2 class="section-title">JOIN OUR MAILING LIST</h2>
	<p>Keep informed for all Portrait <br>Associates has to offer.</p>
</section>

<section class="testimonials">
	<h2 class="section-title">TESTIMONIALS</h2>
</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
