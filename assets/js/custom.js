/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider

	
	var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      autoplay: {
	    delay: 3000,
	  },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });

	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});


	$("#primary-menu > li > a").each(function(){
		var wave = $("#waveSvg").html();
		$(this).append(wave);
	});
	
	// $("#primary-menu  li.menu-item-has-children").hover(
	// 	function(){
	// 		$(this).find("a").next().slideDown();
	// 	}, function() {
	// 		$(this).find("a").next().slideUp();
	// 	}
	// );

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click",".menu-toggle",function(){
		$(this).toggleClass('open');
		$('body').toggleClass('open-menu');
		$(".main-navigation").toggleClass('open');
		$(".main-menu").slideToggle();
	});

	var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
	var is_scroll = false;
	var ii = 1;

	if( $(".animateOnScroll").length ) {
		$(window).on('scroll', function() {
	      var scrollTop = $(window).scrollTop();
	      var line_height = $(".animateOnScroll .line").outerHeight();
	      var barHeight = $(".animateOnScroll").outerHeight();
	      var currentPage = $(window).height();

	      $(".paddle").addClass('action');

	      if(scrollTop>200) {
	      	$(".animateOnScroll .scrollObj").addClass("fixed");
	      	//$(".animateOnScroll .scrollObj").css("margin-top","20px");
	      } else {
	      	$(".animateOnScroll .scrollObj").removeClass("fixed");
	      	//$(".animateOnScroll .scrollObj").css("margin-top","");
	      }

			if($(window).scrollTop() + $(window).height() == $(document).height()) {
				$(".animateOnScroll .scrollObj").addClass('bottom');
			} else {
				$(".animateOnScroll .scrollObj").removeClass('bottom');
			}

	      ii++;
	   });


		if($(window).scrollTop() + $(window).height() == $(document).height()) {
			$(".animateOnScroll .scrollObj").addClass('bottom');
		} else {
			$(".animateOnScroll .scrollObj").removeClass('bottom');
		}


		$.fn.scrollStopped = function(callback) {
		  var that = this, $this = $(that);
		  $this.scroll(function(ev) {
		    clearTimeout($this.data('scrollTimeout'));
		    $this.data('scrollTimeout', setTimeout(callback.bind(that), 250, ev));
		  });
		};

		$(window).scrollStopped(function(ev){
		  $(".paddle").removeClass('action');
		});


	    var dashes = $(".animateOnScroll .line").html();
	    var scrollHtml = "<div class='animateOnScroll continue'><div class='line'>"+dashes+"</div></div>";
	    $("body.home .section").not(".row1").each(function(){
	    	$(this).append(scrollHtml);
	    });

	}

	/* Filter Options => Projects page */
	$(document).on("click","#filterprojects a",function(e){
		e.preventDefault();
		var target = $(this);
		var url = $(this).attr('href');
		window.history.pushState('', document.title, url);
		$("#filterprojects a").removeClass("active");
		setTimeout(function(){
			$("#loaderdiv").addClass('show');
			$(".project-galleries").load(url + " #projectslist",function(){
				target.addClass('active');
				$("#loaderdiv").removeClass('show');
			});
		},200);
	});

    /* News Page Filter */
    do_masonry();
	function do_masonry() {
		$('.grid').masonry({
		  itemSelector: '.grid-item',
		  columnWidth: '.grid-sizer',
		  percentPosition: true,
		  alignLTR: true
		});
	}

    var newsFilter = ".news-filter";
    if( $(".allnewspage").length ) {

	    if( $(newsFilter).length ) {
	    	$(document).on("click", newsFilter + " a",function(e){
	    		e.preventDefault();
	    		$(newsFilter + " a").removeClass("active");
	    		$(this).addClass("active");
	    		var link = $(this).attr("href");
	    		window.history.pushState("",document.title,link);
	    	});
	    }


	    $(document).on("click","#loadMoreBtn",function(e){
	    	e.preventDefault();
	    	var target = $(this);
			var paged = target.attr('data-pg');
			var nextPage = parseInt(paged) + 1;
			var total = target.attr('data-total');
			var post_type = target.attr('data-posttype');
			var termId = target.attr('data-term');
			var $postContainer = $("#innerPosts .masonry");
			var pageLink = '';
			var nextPageLink = '';
			target.attr('data-pg',nextPage);
			if( $("#pagination a").length ) {
				var part = $("#pagination a")[0];
				pageLink = $(part).attr('href');
				var paramsArr = pageLink.split("?");
				var params = paramsArr[1];
				var pgArr = pageLink.split("pg=");
				var xpg = pgArr[1];		
				var theParams = params.replace('pg='+xpg,'pg='+nextPage);
				if(termId>0) {
					nextPageLink = currentPage + '?catid=' + termId + '&' + theParams;	
				} else {
					nextPageLink = currentPage + '?' + theParams;	
				}
			}

			var noPostTxt = '<span class="lastposts">No more posts to load.</span>';
			if(nextPageLink) {
				$.ajax({
					url: nextPageLink,
					type: 'GET',
					beforeSend:function(){
						$("#loaderdiv").addClass("show");
					},
					success: function(res) {
						
						if( $(res).find('#innerPosts').length ) {
							var content = $(res).find('#innerPosts .masonry .item').html(); 
							var i = 1;
							var stopDiv = '';

							$(res).find('#innerPosts .masonry .item').each(function(){
								var $div = $(this);
								var postId = $(this).attr("id");
								$(this).appendTo($postContainer);
								$(this).addClass('animated fadeIn');
								if(i==1) {
									stopDiv = postId;
								}
								i++;
							});
							
							
							var totalItems = $(".masonry .item").length;
							if(total == totalItems) {
								$(".moreposts").html(noPostTxt);
							}

							//window.history.pushState("","",nextPageLink);
							//var targetDiv = $('.moreposts');
							var targetDiv = $('#' + stopDiv);
		
							$('html, body').animate({
					          scrollTop: targetDiv.offset().top
					        }, 100, function() {
					          targetDiv.focus();
					          if (targetDiv.is(":focus")) { // Checking if the target was focused
					            return false;
					          } else {
					            targetDiv.attr('tabindex','-1'); // Adding tabindex for elements not focusable
					            targetDiv.focus(); // Set focus again
					          };
					        });


						} else {
							
							$(".moreposts").html(noPostTxt);
						}

						$("#loaderdiv").removeClass("show");
		
					},
					complete:function(){
						$('.grid').masonry('destroy');
						do_masonry();
					},
					error: function (xhr, ajaxOptions, thrownError) {
						$("#loaderdiv").removeClass("show");
					}
				});
			}

	    });

	    $(document).on("click",".news-filter a",function(e){
	    	e.preventDefault();
	    	var pagelink = $(this).attr("href");
			$.ajax({
				url: pagelink,
				type: 'GET',
				beforeSend:function(){
					$("#loaderdiv").addClass("show");
				},
				success: function(res) {

					if( $(res).find('#innerPosts').length ) {
						var result = $(res).find('#innerPosts').html();
						$('#innerPosts').html(result);
					}

					$("#loaderdiv").removeClass("show");

				},
				complete:function(){
					do_masonry();
				},
				error: function (xhr, ajaxOptions, thrownError) {
					$("#loaderdiv").removeClass("show");
				}
			});
	    });

	}


	if( location.hash && location.hash.length ) {
      var currentHash = location.hash;  
      var target = $(currentHash);
      //var offsetHeight = $(".hero").outerHeight();
      var offsetHeight = 170;
      $('html, body').animate({
        scrollTop: target.offset().top - offsetHeight
      }, 1000, function() {
        var $target = target;
        $target.focus();
        if ($target.is(":focus")) { // Checking if the target was focused
          return false;
        } else {
          $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
          $target.focus(); // Set focus again
        };
      });
    }


});// END #####################################    END