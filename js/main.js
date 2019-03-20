var App = {
    scrollfixed: function () {
        if (jQuery('#header_site.fixed-top').length) {
            var lastScrollTop = 0;
            jQuery(window).scroll(function(event){
                var sticky = jQuery('#header_site.fixed-top'),
                    st = jQuery(this).scrollTop();
                if (st > lastScrollTop && st >=100){
                    // downscroll code
                    sticky.addClass('d-none');
                    sticky.removeClass('fixed');
                } else if(st==0) {
                    sticky.removeClass('fixed');
                }
                else{
                    // upscroll code
                    sticky.removeClass('d-none');
                    sticky.addClass('fixed');
                }
                lastScrollTop = st;
            });
        }
    },
    resizeSlide: function () {
        if(jQuery('.width_custom').length){
            var $width = jQuery('.grid_site .grid_inner').innerWidth();
            var $fullwidth = jQuery(window).innerWidth();
            var $widthmg = ($fullwidth - $width)/2;
            jQuery('.width_custom').each(function () {
                jQuery(this).attr('style','padding-left:'+$widthmg+'px');
            });
        }
    },
    slideprimary: function () {
        jQuery('.slider_site').owlCarousel({
            items: 1,
            loop:true,
            nav: false,
            autoplay : true,
            autoplayTimeout: 8000,
            transitionStyle : "fade",
            smartSpeed:450,
            /*animateOut: 'fadeOut',
            animateIn: 'fadeIn',*/
            dots: true
        });
        var myArray = ['fadeInLeft', 'fadeInRight', 'fadeInUp', 'fadeInDown', 'flipInX'];
        jQuery(".slider_site").on('changed.owl.carousel', function(event) {
            var item      = event.item.index + 1;
            var rand = myArray[Math.floor(Math.random() * myArray.length)];
            jQuery('.slider_site .owl-item:nth-of-type('+item+') .box_meta_slide').attr('class','box_meta_slide');
            setTimeout(function () {
                jQuery('.slider_site .owl-item.active .box_meta_slide').addClass(rand + ' animated')
            },500);
        });
    },
    sliderwork: function () {
        var swiper = new Swiper('.slide_work', {
            slidesPerView: 4,
            slidesPerColumn: 2,
            spaceBetween: 30,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
            }
        });
    },
    sliderportexim: function () {
        var swiper = new Swiper('.slide_exim', {
            slidesPerView: 3,
            slidesPerColumn: 1,
            spaceBetween: 30,
            autoplay: true,
            autoplaySpeed: 10000,
            speed: 1000,
            infinite: true,
            pagination: {
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
            }
        });
    },
    scalelogo: function () {
        if(jQuery('#logo_animate').length){
            var $h = jQuery(window).outerHeight();
            jQuery(window).scroll(function () {
                var ScrollTop = parseInt(jQuery(window).scrollTop());
                if (ScrollTop < $h){
                    jQuery('#logo_animate').removeClass('d-none');
                    jQuery('#logo_animate img').attr('style','transform: scale('+((($h - ScrollTop)/$h)*10+1)+');-webkit-transform: scale('+((($h - ScrollTop)/$h)*10+1)+');-moz-transform: scale('+((($h - ScrollTop)/$h)*10+1)+');');
                } else{
                    jQuery('#logo_animate').addClass('d-none');
                }
            })
        }
    },
    rmtranstop: function(){
        if(jQuery('.trans_top').length){
            jQuery('.trans_top').each(function () {
               var $position = jQuery(this).offset().top;
               var $outerheight = jQuery(this).outerHeight() - 10;
               var $this = jQuery(this);
                jQuery(window).scroll(function () {
                   var ScrollTop = parseInt(jQuery(window).scrollTop());
                   if(ScrollTop >= $position - $outerheight){
                       $this.addClass('down');
                       console.log(2);

                   } else{
                       $this.removeClass('down');
                   }
               })
            });
        }
    },
    clickcareer: function () {
        if(jQuery('.section_page.able-click').length){
            jQuery('.section_page.able-click').each(function () {
                var $this = jQuery(this);
                $this.find('.title_block').click(function () {
                    jQuery(this).toggleClass('alr_show');
                    $this.find('.able-show-hide').slideToggle();
                    $this.find('.able-show-hide').toggleClass('showdown');
                })
            });
        }
    },
    outword: function () {
        if(jQuery('.epilogue .word').length){
            anime.timeline({loop: true})
                .add({
                    targets: '.epilogue .word',
                    scale: [14,1],
                    opacity: [0,1],
                    easing: "easeOutCirc",
                    duration: 800,
                    delay: function(el, i) {
                        return 800 * i;
                    }
                }).add({
                targets: '.epilogue',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
        }
    },
    upfile: function () {
        if (jQuery('.file-upload').length) {
            jQuery('.file-upload').each(function () {
                var $this = jQuery(this);
                $this.find('input[type=file]').on('change', function (e) {
                    var fileName = e.target.files[0].name;
                    $this.find('.ibenic_file_upload_text').text(fileName);
                    /*if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $this.find('.imgchoose img').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    }*/
                })
            })
        }
    },
};
jQuery(document).ready(function(){
    App.scrollfixed();
    App.resizeSlide();
    App.slideprimary();
    App.sliderwork();
    //App.sliderportexim();
    App.clickcareer();
    //App.scalelogo();
    App.outword();
    App.upfile();
    setTimeout(function () {
        App.rmtranstop();
    },3000);
    AOS.init({
        duration: 600,
        easing: 'ease-in-sine',
        delay: 200,
        once: true,
        disable: function () {
            var maxWidth = 768;
            return window.innerWidth < maxWidth;
        }});
    jQuery('[data-toggle="tooltip"]').tooltip();
});
