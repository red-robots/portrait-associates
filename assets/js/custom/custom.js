/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});

	/*
	*
	*	Responsive iFrames
	*
	------------------------------------*/
	var $all_oembed_videos = $("iframe[src*='youtube']");
	
	$all_oembed_videos.each(function() {
	
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	
 	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').imagesLoaded(function () {   
        $('.flexslider').flexslider({
            animation: "fade",
            smoothHeight: true,
			controlNav: false,
            before: function (slider) { // Fires asynchronously with each slider animation
                var $slides = $(slider.slides),
                    index = slider.animatingTo,
                    current = index,
                    nxt_slide = current + 1,
                    prev_slide = current - 1;
                if ($slides.length > 0) {
                    $slides.eq(current).add($slides.eq(nxt_slide)).add($slides.eq(prev_slide))
					.find('img.lazy').each(function () {
						var src = $(this).attr('data-src');
						$(this).removeClass('lazy');
						$(this).attr('src', src).removeAttr('data-src');
					});
                }
            }
        }); // end register flexslider
    });
	$('.single-portrait-wrapper .portrait').click(function(){
		var id = $(this).data('id');
		var flexslider2 = $('.flexslider').data('flexslider');
		flexslider2.pause();
		flexslider2.flexAnimate(id);
	});
	$('.flexslider li img').click(function(){
		$('.flexslider').flexslider('next');
	});
	/* 
	* Custom menu
	*/
	$('.cat-menu >ul >li div.top').click(function(){
		var $li = $(this).parent();
		if($li.hasClass('active')){
			$li.removeClass('active');
		} else {
			$li.addClass('active');
		}
	});

	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.team-popup').click(function (e) {
        e.preventDefault();
        $.colorbox({
            className: "team-popup",
            inline: true,
            href: this.hash,
            width: '90%',
            maxWidth: '960px',
            close: '<i class="fa fa-close"></i>',
        });
    });
    $(window).on('resize', function () {
        var width = window.innerWidth * 0.9 > 960 ? '960px' : '90%';
        $.colorbox.resize({
            width: width,
        });
    });
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 0
			}
 		 });
	});
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$('.button--bubble').each(function() {
  var $circlesTopLeft = $(this).parent().find('.circle.top-left');
  var $circlesBottomRight = $(this).parent().find('.circle.bottom-right');

  var tl = new TimelineLite();
  var tl2 = new TimelineLite();

  var btTl = new TimelineLite({ paused: true });

  tl.to($circlesTopLeft, 1.2, { x: -25, y: -25, scaleY: 2, ease: SlowMo.ease.config(0.1, 0.7, false) });
  tl.to($circlesTopLeft.eq(0), 0.1, { scale: 0.2, x: '+=6', y: '-=2' });
  tl.to($circlesTopLeft.eq(1), 0.1, { scaleX: 1, scaleY: 0.8, x: '-=10', y: '-=7' }, '-=0.1');
  tl.to($circlesTopLeft.eq(2), 0.1, { scale: 0.2, x: '-=15', y: '+=6' }, '-=0.1');
  tl.to($circlesTopLeft.eq(0), 1, { scale: 0, x: '-=5', y: '-=15', opacity: 0 });
  tl.to($circlesTopLeft.eq(1), 1, { scaleX: 0.4, scaleY: 0.4, x: '-=10', y: '-=10', opacity: 0 }, '-=1');
  tl.to($circlesTopLeft.eq(2), 1, { scale: 0, x: '-=15', y: '+=5', opacity: 0 }, '-=1');

  var tlBt1 = new TimelineLite();
  var tlBt2 = new TimelineLite();
  
  tlBt1.set($circlesTopLeft, { x: 0, y: 0, rotation: -45 });
  tlBt1.add(tl);

  tl2.set($circlesBottomRight, { x: 0, y: 0 });
  tl2.to($circlesBottomRight, 1.1, { x: 30, y: 30, ease: SlowMo.ease.config(0.1, 0.7, false) });
  tl2.to($circlesBottomRight.eq(0), 0.1, { scale: 0.2, x: '-=6', y: '+=3' });
  tl2.to($circlesBottomRight.eq(1), 0.1, { scale: 0.8, x: '+=7', y: '+=3' }, '-=0.1');
  tl2.to($circlesBottomRight.eq(2), 0.1, { scale: 0.2, x: '+=15', y: '-=6' }, '-=0.2');
  tl2.to($circlesBottomRight.eq(0), 1, { scale: 0, x: '+=5', y: '+=15', opacity: 0 });
  tl2.to($circlesBottomRight.eq(1), 1, { scale: 0.4, x: '+=7', y: '+=7', opacity: 0 }, '-=1');
  tl2.to($circlesBottomRight.eq(2), 1, { scale: 0, x: '+=15', y: '-=5', opacity: 0 }, '-=1');
  
  tlBt2.set($circlesBottomRight, { x: 0, y: 0, rotation: 45 });
  tlBt2.add(tl2);

  btTl.add(tlBt1);
  btTl.to($(this).parent().find('.button.effect-button'), 0.8, { scaleY: 1.1 }, 0.1);
  btTl.add(tlBt2, 0.2);
  btTl.to($(this).parent().find('.button.effect-button'), 1.8, { scale: 1, ease: Elastic.easeOut.config(1.2, 0.4) }, 1.2);

  btTl.timeScale(2.6);

  $(this).on('mouseover', function() {
    btTl.restart();
  });
});

	var $col = $('.template-process >.row-2 >.wrapper >.col-1 >.inner-wrapper');
	if($col.length>0){
		var $window = $(window);
		var $footer = $('#colophon');
		function sticky_sidebar(){
			var window_top = $window.scrollTop();
			var window_width = window.innerWidth;
			var $wrapper = $('.template-process >.row-2 >.wrapper');
			var anchor_top = $wrapper.offset().top;
			var anchor_bottom = $footer.offset().top;
			if(window_width>=600&&window_top>=anchor_top){
				if($col.outerHeight()+window_top>=anchor_bottom){
					$col.css({
						padding: '100px 0 100px 0',
						position: 'fixed',
						top: -1*($col.outerHeight()-(anchor_bottom-window_top)),
						backgroundColor: 'white',
						maxWidth: '330px',
						left:parseFloat($wrapper.css("paddingLeft"))+parseFloat($wrapper.offset().left),
						width: '28%'
					});
				} else {
					$col.css({
						padding: '100px 0 100px 0',
						position: 'fixed',
						top: 0,
						maxWidth: '330px',
						backgroundColor: 'white',
						left:parseFloat($wrapper.css("paddingLeft"))+parseFloat($wrapper.offset().left),
						width: '28%'
					});
				}
			} else {
				$col.css({
					position:'',
					top: '',
					backgroundColor: '',
					left: '',
					width: '',
					padding: ''
				});
			}
		}
		sticky_sidebar();
		$window.on('scroll',sticky_sidebar);
		$window.on('resize',sticky_sidebar);
	}

	$('.filter-term').click(function(){
        var value = this.className.match(new RegExp("\\bvalue-(.*)\\b"));
        if(value===null){
            return;
        }
        value = value[1];
        var $redirect_node = $(this).parents('.redirect-url').eq(0);
        if($redirect_node.length===0){
            return;
        }
        var redirect = $redirect_node[0].className.match(new RegExp("\\bvalue-(.*)\\b"));
        if(redirect===null){
            return;
        }
        redirect = redirect[1];
        var redirect_query = redirect.match(new RegExp("\\?[^#]*(filter=([^&#]*))"));
        var current_page_query = window.location.href.match(new RegExp("\\?[^#]*(filter=([^&#]*))"));
        var filters = current_page_query ? 
            current_page_query[2]===""? Array():current_page_query[2].replace("%2C",",").split(",") :
            Array();
        var index = filters.indexOf(value);
        if(index === -1){
            filters.push(value);
        } else {
            filters.splice(index,1);
        }
        if(filters.length>0){
            filters = filters.join(",");
        } else {
            filters = "";
        }
        if(redirect_query===null){
            var index = redirect.indexOf("?");
            if(index===-1){
                var index = redirect.indexOf("#");
                if(index===-1){
                    var full_url = redirect+"?filter="+filters;
                } else {
                    var full_url = redirect.slice(0,index)+"?filter="+filters+redirect.slice(index);
                }
            } else {
                var length = redirect.length;
                var full_url = redirect.slice(0,index+1)+"filter="+filters;
                if(index===length-1){
                    full_url = full_url + redirect.slice(index+1);
                } else {
                    full_url = full_url + "&"+redirect.slice(index+1);
                }
            }
        } else {
            var filter_string = redirect_query[1];
            var full_url = redirect.replace(filter_string,"filter="+filters);
        }
        window.location.href = full_url;
    });
});// END #####################################    END