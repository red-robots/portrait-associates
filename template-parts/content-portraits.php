<?php if(have_posts()):?>
    <section id="container" class="row-3 portrait-wrapper clear-bottom">
        <?php $i=0; 
        while(have_posts()): the_post();
        $id=get_the_ID();
        $terms = get_queried_object();
        
            ?>
            <?php $image = get_field("image");
            if($image):?>
                <div class="portrait item <?php if($i%5==0) echo 'first';?> <?php if(($i-4)%5==0) echo 'last';?>">
                    <a href="<?php the_permalink();?>">
                        <img src="<?php echo $image['sizes']['medium'];?>" alt="<?php echo $terms->name;?> FINE ART PORTRAITURE"> 
                    </a>
                </div><!--.portfolio-->
                <?php $i++;
            endif;?>
        <?php endwhile;?>
    </section><!--.row-3-->
<?php endif;?>