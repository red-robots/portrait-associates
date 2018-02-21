<?php if(have_posts()):?>
    <section class="single-portrait-wrapper clear-bottom">
        <?php $i=0; 
        while(have_posts()): the_post();?>
            <?php $image = get_field("image");
            if($image):?>
                <div class="portrait js-blocks">
                    <a href="<?php the_permalink();?>">
                        <img src="<?php echo $image['sizes']['thumbnail'];?>" alt="<?php echo $image['alt'];?>"> 
                    </a>
                </div><!--.portfolio-->
                <?php $i++;
            endif;?>
        <?php endwhile;?>
    </section><!--.row-3-->
<?php endif;?>