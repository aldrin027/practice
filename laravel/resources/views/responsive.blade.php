<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Responsive Progressive Website</title>
    {!! HTML::style('assets/bootstrap/css/bootstrap.css') !!}
    {!! HTML::style('assets/easyui/themes/default/easyui.css') !!}
    {!! HTML::style('assets/easyui/themes/icon.css') !!}
    {!! HTML::style('assets/my_css.css') !!}

    <style>

        /*This is for mobile devices ONLY*/


        @media (max-width: 320px) {

            .header .video-content #logo {
                color: red;
                clear: both;
            }

            .sub-content {
                margin-top: 20%;
            }
        }



    </style>

</head>
    <body>

    <div class="main">
        <div class="header">
                {{--<div class="header-navbar">--}}
                    {{--<ul>--}}
                        {{--<li><a href="#" class="header_btn btn btn-default">Test1</a></li>--}}
                        {{--<li><a href="#" class="header_btn btn btn-default">Test2</a></li>--}}
                        {{--<li><a href="#" class="header_btn btn btn-default">Test3</a></li>--}}
                        {{--<li><a href="#" class="header_btn btn btn-default">Test4</a></li>--}}
                        {{--<li><a href="#" class="header_btn btn btn-default">Test5</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            <div class="video-content">

                <span id="logo">TEST1234</span>
                {!! HTML::image('../projectshit/assets/space.jpg', 'alt', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated; /** animation: space 30s linear infinite; **/']) !!}
            </div>

        </div>
        <div class="main-content">  <!-- Start of main content -->
            <div class="sub-content" id="first_content">

                <div class="images_test" style="padding: 10%;">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-xs-12 col-md-6">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-xs-6 col-md-6">

                                            <a href="javascript:void(0);" class="thumbnail">
                                                {{--<div class="centerAll"></div>--}}
                                                {!! HTML::image('../projectshit/assets/poker2.jpg', 'Poker', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated;']) !!}
                                                <div class="blue">
                                                    <span class="caption_text">
                                                        THIS IS MY TITLE
                                                    </span>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <a href="javascript:void(0);" class="thumbnail">
                                                {!! HTML::image('../projectshit/assets/dice.jpg', 'Dice', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated;']) !!}
                                                <div class="blue">
                                                    <span class="caption_text">
                                                        THIS IS MY TITLE
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <a href="javascript:void(0);" class="thumbnail">
                                                {!! HTML::image('../projectshit/assets/poker3.jpg', 'Poker', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated;']) !!}
                                                <div class="blue">
                                                    <span class="caption_text">
                                                        THIS IS MY TITLE
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <a href="javascript:void(0);" class="thumbnail">
                                                {!! HTML::image('../projectshit/assets/poker3.jpg', 'Poker', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated;']) !!}
                                                <div class="blue">
                                                    <span class="caption_text">
                                                        THIS IS MY TITLE
                                                    </span>
                                                </div>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="col-xs-12 col-md-12">

                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                {!! HTML::image('../projectshit/assets/bjack.jpg', 'Black Jack', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated;']) !!}
                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                {!! HTML::image('../projectshit/assets/slots.jpg', 'Slots', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated;']) !!}
                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                {!! HTML::image('../projectshit/assets/poker.jpg', 'Poker', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated;']) !!}
                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div> <!-- end of class row -->
                    </div>

                    {{--<div class="center"></div>--}}
                    </div>

            </div>
            <div class="sub-content" id="second_content">
                <p>
                    Ut at pellentesque mi. Cras ultrices, metus vitae fringilla venenatis, sapien mi accumsan mauris, at fermentum magna mi et odio. Suspendisse scelerisque magna nibh, in consequat mi tincidunt eget. Nullam efficitur, augue at dignissim euismod, mauris sem consequat ex, eu congue quam est at nibh. Mauris pellentesque velit vel ipsum tristique imperdiet. Aenean ipsum magna, iaculis sed ex non, euismod fringilla urna. Integer condimentum venenatis magna accumsan laoreet. Fusce faucibus varius urna a semper.

                    Etiam vehicula vel augue sit amet dapibus. Integer gravida mollis dapibus. Morbi sed risus a nulla rhoncus maximus. Donec ut lacus massa. Cras faucibus nunc vitae eros sollicitudin, cursus tincidunt lacus sodales. Vivamus et sapien metus. Duis volutpat odio eget rutrum vestibulum. Etiam sit amet ex nec augue ultricies dignissim eget in risus. Curabitur eros ipsum, rutrum vitae mauris a, egestas tristique mauris. Donec sed tortor enim. Pellentesque ex nisi, congue at quam in, vestibulum tempus neque. Sed massa lacus, gravida ac ante nec, porttitor auctor felis.

                    Morbi sed blandit mi, ut pharetra magna. Phasellus feugiat lorem neque, ac ornare metus lobortis eget. Fusce cursus ipsum ac lectus pretium, quis vestibulum nunc suscipit. Nam est nibh, venenatis interdum elementum vel, malesuada placerat nisl. Maecenas ornare rutrum tempus. Integer id nibh in felis finibus interdum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis pulvinar porttitor mi. Etiam eu fringilla nunc.
                </p>
            </div>
            <div class="sub-content" id="third_content">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dignissim augue neque, et molestie nisi pretium at. In fringilla, metus in dapibus tristique, sapien libero semper dolor, a dignissim nulla nulla in leo. Quisque eget lectus dapibus, egestas nisi et, eleifend mauris. Curabitur posuere purus vel diam mattis, mattis interdum urna accumsan. Pellentesque hendrerit sodales arcu, aliquam lobortis tellus. Morbi egestas enim augue, id hendrerit nisi efficitur at. Sed vitae libero auctor, egestas massa vel, porta nulla. Maecenas lobortis, lacus non pharetra eleifend, neque sem pharetra purus, id congue metus magna eget neque. Vestibulum interdum elit arcu, molestie ultricies libero volutpat eu. Integer magna quam, ornare eget tempus in, tincidunt non dolor.

                    Nunc consectetur cursus aliquet. Pellentesque massa tellus, dictum ac pulvinar ut, volutpat vel massa. Quisque eu lorem arcu. Sed ac enim ex. Cras mattis mi massa, id dapibus sapien aliquam nec. Vivamus ligula arcu, gravida in massa quis, condimentum dignissim est. Curabitur enim neque, efficitur nec turpis at, placerat condimentum sapien. Proin in elit vel massa fermentum placerat a volutpat metus. Cras ultricies eros quis risus luctus, ac rutrum sapien aliquet. Vestibulum hendrerit eros a pulvinar vehicula. Donec posuere mauris sagittis bibendum dapibus. Sed tempus turpis vel tellus posuere pretium. Nunc tellus est, sodales id ex ac, pulvinar blandit nunc. Aenean sagittis tristique pretium.
                </p>
            </div>
        </div> <!-- END of main content -->
    </div>
    <div class="footer">
        TEST FOOTER
    </div>

    {!! HTML::script('assets/bootstrap/js/jquery-2.1.4.js') !!}
    {!! HTML::script('assets/easyui/jquery.min.js') !!}
    {!! HTML::script('assets/easyui/jquery.easyui.min.js') !!}
    {!! HTML::script('assets/bootstrap/js/bootstrap.js') !!}

        <script>

            $.fn.is_on_screen = function (){
                var win = $(window);
                var viewport = {
                    top : win.scrollTop(),
                    left : win.scrollLeft()
                };
                viewport.right = viewport.left + win.width();
                viewport.bottom = viewport.top + win.height();

                var bounds = this.offset();
                bounds.right = bounds.left + this.outerWidth();
                bounds.bottom = bounds.top + this.outerHeight();

                return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
            };


            $(function () {

                $(window).on('scroll',function () {

                    var content_elem = $('.sub-content');

                    $.each(content_elem, function(i, v) {

                        if($(v).is_on_screen())
                        {
                            $(v).addClass('test' + i);
                            $(this).siblings('content_elem');
                        }else{
                            $(v).removeClass('test' + i);
                        }

                    });

                    var thumbnail = $('.thumbnail');

                    thumbnail.on({
                        mouseenter:  function () {

                            $(this).children('.caption_title').addClass('fadeDown');
//                            $(this).siblings().addClass('fadeDown');
                        },
                        mouseleave: function () {
//                            $(this).siblings().removeClass('fadeDown');
                            $(this).children('.caption_title').removeClass('fadeDown');
                        },
                        click: function (e) {
                            console.log($(this))
//                            $(this).css({
//                                position: 'fixed',
//                                top: '50%',
//                                bottom: 0,
//                                right: 0,
//                                left: 0,
//                                height: '149.88px',
//                                width: '227.59px',
//                                transform: 'translate(-50%, -50%)',
//                                zIndex: '999',
//                                margin: '0 auto'});
//                            $(this).parents('.imgOverlay').addClass('goLargeCenterImg');
                        }
                    });


                    $('.blue').on({
                        mouseenter:  function () {
                            $(this).siblings('img').addClass('hoverImg');
                            $(this).addClass('hoverCaption');
//                            console.log($(this).siblings('img'))
//                            $(this).siblings('img').css({webkitFilter: 'blur(1px)'});

                        },
                        mouseleave: function () {
                            $(this).siblings('img').removeClass('hoverImg');
                            $(this).removeClass('hoverCaption');
//                            $(this).siblings('img').css({webkitFilter: 'blur(0)'});
                        }
                    });

//                    var viewTop = $(this).scrollTop(),
//                        viewLeft = $(this).scrollLeft(),
//                        viewRight = viewLeft + $(this).width(),
//                        viewBot = viewTop + $(this).height(),
//                        content_elem = $('.sub-content');

//                    $.each(content_elem, function(i, v) {


//                        if($(v).offset().top - winTop < $(v).height())
//                        {
//                            $(v).addClass('test' + i);
////                            console.log($(this).attr('id'));
//                        }else{
//                            $(v).removeClass('test' + i);
//                        }
//                    });
//                    var $elem = $('.sub-content');
//                    $.each($elem, function (i, v) {
//                        console.log($(v).offset().top);
//                    });
                });

            });

        </script>
    </body>
</html>

