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

    <style>
        /*body{*/
            /*height: 100%;*/
            /*background-color: #c0c0c0;*/
        /*}*/

        .header {
            position: relative;
            height: 100vh;
        }

        .header .video-content #logo {
            color: white;
            position: absolute;
            width: 100%;
            text-align: center;
            top: 50%;
            margin-top: -5%;
            z-index: 1;
            /*display: none;*/
            font-size: 100%;
            clear: both;
        }

        @media (max-width: 320px) {

            .header .video-content #logo {
                color: red;
                clear: both;
            }
        }


        .header .header-navbar {
            z-index: 1;
            position: fixed;
            text-align: center;

        }

        .header .header-navbar ul {
            list-style-type: none;
        }

        .header .header-navbar ul li {
            display: inline-block;
        }
        .main{
            height: 100%;
            width: 100%;
            background-color: cornsilk;
        }

        .main-content{
            height: 2400px;
            width: 100%;
        }

        .sub-content {
            height: 100vh;
            width: 100%;
            margin-top: 10%;
        }
        .footer{
            height: 65px;
            width: 100%;
        }

        .header .video-content {
            position: relative;
            height: 100%;
            width: 100%;
            /*background-image: url('../../public/assets/space.jpg');*/
            /*image-rendering: pixelated;*/
            /*animation: space 30s linear infinite;*/
        }



        @-webkit-keyframes space{
            0% { -webkit-transform: scale(1); }
            100% { -webkit-transform: scale(1.1); }
        }
        @-moz-keyframes space{
            0% { -moz-transform: scale(1); }
            100% { -moz-transform: scale(1.1); }
        }
        @-o-keyframes space{
            0% { -o-transform: scale(1); }
            100% { -o-transform: scale(1.1); }
        }
        @keyframes space{
            0% {  transform: scale(1); }
            100% { transform: scale(1.1); }
        }
    </style>

</head>
    <body>

    <div class="main">
        <div class="header">
                <div class="header-navbar">
                    <ul>
                        <li><a href="#" class="header_btn btn btn-default">Test1</a></li>
                        <li><a href="#" class="header_btn btn btn-default">Test2</a></li>
                        <li><a href="#" class="header_btn btn btn-default">Test3</a></li>
                        <li><a href="#" class="header_btn btn btn-default">Test4</a></li>
                        <li><a href="#" class="header_btn btn btn-default">Test5</a></li>
                    </ul>
                </div>
            <div class="video-content">

                <span id="logo">TEST1234</span>
                {!! HTML::image('../public/assets/space.jpg', 'alt', ['width' => '100%', 'height' => '100%', 'style' => 'image-rendering: pixelated; /** animation: space 30s linear infinite; **/']) !!}
            </div>

        </div>
        <div class="main-content">
            <div class="sub-content" id="first_content">
                {{--<div class="row">--}}
                <div class="col-md-6 col-xs-12">
                    <div class="col-md-6 col-xs-6">
                        <a href="#" class="thumbnail">
                            <img src="..." alt="...">
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <a href="#" class="thumbnail">
                            <img src="..." alt="...">
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <a href="#" class="thumbnail">
                            <img src="..." alt="...">
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <a href="#" class="thumbnail">
                            <img src="..." alt="...">
                        </a>
                    </div>
                </div>

                    <div class="col-md-6 col-xs-12">
                        <a href="#" class="thumbnail">
                            <img src="..." alt="...">
                        </a>
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
        </div>
    </div>
    <div class="footer">
        TEST FOOTER
    </div>

    {!! HTML::script('assets/bootstrap/js/jquery-2.1.4.js') !!}
    {!! HTML::script('assets/easyui/jquery.min.js') !!}
    {!! HTML::script('assets/easyui/jquery.easyui.min.js') !!}
    {!! HTML::script('assets/bootstrap/js/bootstrap.js') !!}

        <script>


            $(function () {

//                $(window).on('load', function () {
//                    setTimeout(function () {
////                        $('#logo').fadeIn('slow');
//                    }, 1000);
//                });
//                var documentElement = $(document),
//                        parallax = $(this).find('.child');

//                documentElement.on('scroll', function(){
//                    var currScrollPos = documentElement.scrollTop();
//                    parallax.css('background-position', '0 ' + -currScrollPos / 4);
//                });




                $(window).on('scroll',function () {

                    var winTop = $(this).scrollTop(),
                        content_elem = $('.sub-content');

                    $.each(content_elem, function(i, v) {


                        if($(v).offset().top - winTop < $(v).height())
                        {
                            $(v).addClass('test' + i);
//                            console.log($(this).attr('id'));
                        }else{
                            $(v).removeClass('test' + i);
                        }
                    });
//                    var $elem = $('.sub-content');
//                    $.each($elem, function (i, v) {
//                        console.log($(v).offset().top);
//                    });
                });
            });




//                $.each(main_items, function (i) {
//                    console.log(i)
//                })
//                $(window).scroll(function () {
//                    var sc = $(window).scrollTop();
//


//                    var sc = $(window).scrollTop()
//                    if (sc >= 100) {
//                        $(".header-navbar").addClass("small")
//                    } else {
//                        $(".header-navbar").removeClass("small")
//                    }
//
//                });
        </script>
    </body>
</html>

