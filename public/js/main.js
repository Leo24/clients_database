jQuery(function($) {
    $(document).ready(function() {
        $('.flexslider').flexslider({
            animation: "fade",
            controlsContainer: $(".custom-controls-container"),
            customDirectionNav: $(".custom-navigation a")
        });

        $('.bxslider').bxSlider({
            pager: false
        });


        $('.custom-navigation.ug-prev').on('click', function(e){
            e.preventDefault();
            $('.ug-button-tile-left').click();
        });

        $('.custom-navigation.ug-next').on('click', function(e){
            e.preventDefault();
            $('.ug-button-tile-right').click();
        });

        //get_page_content on services page

        $('#menu-services-menu .menu-item a').on('click', function (e) {
            e.preventDefault();
            var url, id, mark, self = $(this);
            mark = self.parents().eq(1).hasClass('ui-accordion-header');
            url = self.attr('href');
            id = self.parent().attr('id');
            if (mark == false) {
                getPostContent(self.attr('href'));
            }else{
                getPostContent(self.parents().eq(2).find('.sub-menu a').first().attr('href'));
            }

            jQuery.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    if (mark !== false) {
                        var url, container = $('.services-page.container-fluid');

                        $('.text-container .text').empty().append(data.service.service_block_text);
                        $('.reasons .reasons-title').empty().append(data.service.reasons_block_title);
                        container.css('opacity', '0');

                        url = replacePicture(container.css('background-image'), data.service.service_block_picture);
                        container.css('background-image', 'url('+ url +')');

                        container.animate({ opacity: 1 }, { duration: 1000 });

                        $.each($('.reasons .reasons-block .reasons-text'), function (index, value) {
                            $(this).empty();
                            $(data.service['reason_'+ (index + 1)]).appendTo($(value));
                        });
                        $.each($('.reasons .reasons-block .image img'), function (index, value) {
                            url = replacePicture($(value).attr("src"), data.service['reason_' + (index + 1) + '_picture']);
                            $(value).attr("src", url);
                        });
                    }
                }
            });
        });

        function replacePicture(url, picture) {
            var bg, output;
            bg = $('.services-page.container-fluid').css('background-image');
            bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
            output = bg.substring(0, bg.lastIndexOf('pictures/'));
            output = output+picture;
            return output;
        }

        function getPostContent(url) {
            jQuery.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    var content = data.article.service_content ? data.article.service_content : data.article.content;
                    $('.services-content').empty().append(content);
                }
            });
        }

        // Phone mask
        $('.phone_us').mask('(000) 000-0000');



// ajax form submit
        $('#contact-form').on('submit', function (e) {
            e.preventDefault();
            jQuery.ajax({
                url: $(this).attr('action'),
                type: "POST",
                datatype: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    if(data.success){
                        $('#contact-form').find("input[type=text],input[type=email]").val("");
                        $('.form .success-text').remove();
                        $('.form').append('<div class="success-text"><p><span>'+data.success+'</span></p></div>');
                    } else {
                        $('.form .error-text').remove();
                        $('.form').append('<div class="error-text"><p><span>'+data.error.email+'</span></p></div>');
                            $(value).attr("src", 'storage/' + data.service['reason_' + (index + 1) + '_picture']);
                    }
                },
                error: function (error) {
                    console.log(error);
                }

            });
        });

        //init slickNav
        $(function(){
            $('#menu-main-menu').slicknav({
                label: '',
                prependTo:'#menu2'
            });
        });

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 1) {
                $("#menu2").addClass("fixed");
            } else {
                $("#menu2").removeClass("fixed");
            }
        });


        jQuery("#certificates").unitegallery();


    });
});