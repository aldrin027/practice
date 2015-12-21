<!DOCTYPE html>
<html>
<head>
    {!! HTML::style('assets/bootstrap/css/bootstrap.css') !!}
    {!! HTML::script('assets/bootstrap/js/jquery-2.1.4.js') !!}
</head>

    <style>
        nav ul.navHeader {
            position: fixed;
            list-style-type: none;
            /*display: block;*/
            width: 100%;
            background-color: #000000;
            height: 80px;
            z-index: 100;
            /*text-align: center;*/
            /*Enable above line to center the navbars links*/
            opacity: 0.5;

        }
        li {
            background-color: #000000;
            /*margin: 205px;*/
            display: inline;
            width: 100%;
            margin: 115px;
        }

        li a {
            position: absolute;
            display: inline-block;
            text-align: center;
            /*top: 35%;*/
            color: white;
            padding: 25px 82px;
            font-size: 20px;
        }

        li a:hover {
            color: #ffff00;
            text-decoration: none;
            background: blue;

        }

        .container {
            /*height: 979px;*/
            height: 500vh;
            width: 100%;
            background: url("http://i264.photobucket.com/albums/ii198/mad_cow2605/DOTA2_169.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            margin: 0;
            overflow-y: hidden;
            overflow-x: hidden;
        }
        
       nav a.logo {
           position: fixed;
           /*position: absolute;*/
           z-index: 10000;
           height: 80px;
           width: 142px;
           border-radius: 100px;
        }

        .dataContent {
            position: absolute;
            width: 100%;
            height: 85%;
            top: 1100px;
            /*left: 0;*/
            /*right: 0;*/
            /*margin-left: auto;*/
            /*margin-right: auto;*/
        }

        .anotherDataContent1 {
            position: absolute;
            width: 98%;
            height: 100%;
            top: 1800px;
            border: 5px solid;
            /*background: #000000;*/

            /*position: absolute;*/
            /*width: 100%;*/
            /*height: 85%;*/
            /*top: 1800px;*/

        }

        .thumbnail {
            height: 100%;
            background: gray;
        }

        .imgDesc {
            display: inline-block;
            height: 60px;
            word-wrap: break-word;
            white-space: normal;
            overflow: auto;
            background: #ffffff;
        }

        .thumbnail > img {
            height: 185px;
            width: 80%;
            z-index: 100000;
        }

        .thumbnail > img:hover {

        }

        .dataContent1Img {
            padding: 35px;
        }
    </style>


<body>

    <nav>
        <a href="#" class="logo">
            <img src="http://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2015/06/1434307560dota2-logo.jpg" alt="#" style="max-width: 100%; max-height: 100%; border-radius: 100px;"/>
        </a>
        <ul class="navHeader">
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact Me</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Experience</a></li>
        </ul>

    </nav>

    <div class="container">
        <div class="row">
            <div class="dataContent col-md-12">

                <div class="content1 col-md-6" style="height: 100%; width: 800px;">
                    <h2 style="text-align: center; vertical-align: middle; background: gray;">CAROUSEL</h2>

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
                                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzkwMHg1MDAvYXV0by8jNzc3OiM1NTUvdGV4dDpGaXJzdCBzbGlkZQpDcmVhdGVkIHdpdGggSG9sZGVyLmpzIDIuNi4wLgpMZWFybiBtb3JlIGF0IGh0dHA6Ly9ob2xkZXJqcy5jb20KKGMpIDIwMTItMjAxNSBJdmFuIE1hbG9waW5za3kgLSBodHRwOi8vaW1za3kuY28KLS0+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsjaG9sZGVyXzE1MThiMDY3NDEzIHRleHQgeyBmaWxsOiM1NTU7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6NDVwdCB9IF1dPjwvc3R5bGU+PC9kZWZzPjxnIGlkPSJob2xkZXJfMTUxOGIwNjc0MTMiPjxyZWN0IHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjNzc3Ii8+PGc+PHRleHQgeD0iMzA4LjI5Njg3NSIgeT0iMjcwLjEiPkZpcnN0IHNsaWRlPC90ZXh0PjwvZz48L2c+PC9zdmc+" alt="...">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                            <div class="item">
                                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzkwMHg1MDAvYXV0by8jNjY2OiM0NDQvdGV4dDpTZWNvbmQgc2xpZGUKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTE4YjA2MjA2NyB0ZXh0IHsgZmlsbDojNDQ0O2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjQ1cHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MThiMDYyMDY3Ij48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiIvPjxnPjx0ZXh0IHg9IjI2NC45NTMxMjUiIHk9IjI3MC4xIj5TZWNvbmQgc2xpZGU8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="...">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                            <div class="item">
                                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzkwMHg1MDAvYXV0by8jNTU1OiMzMzMvdGV4dDpUaGlyZCBzbGlkZQpDcmVhdGVkIHdpdGggSG9sZGVyLmpzIDIuNi4wLgpMZWFybiBtb3JlIGF0IGh0dHA6Ly9ob2xkZXJqcy5jb20KKGMpIDIwMTItMjAxNSBJdmFuIE1hbG9waW5za3kgLSBodHRwOi8vaW1za3kuY28KLS0+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsjaG9sZGVyXzE1MThiMDY1MzFlIHRleHQgeyBmaWxsOiMzMzM7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6NDVwdCB9IF1dPjwvc3R5bGU+PC9kZWZzPjxnIGlkPSJob2xkZXJfMTUxOGIwNjUzMWUiPjxyZWN0IHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjNTU1Ii8+PGc+PHRleHQgeD0iMjk4LjMyMDMxMjUiIHk9IjI3MC4xIj5UaGlyZCBzbGlkZTwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
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

                    <div class="carouselDesc" style="height: 38%; width: 100%; background: #000000;">
                        <div style="">

                        </div>
                    </div>

                </div>
                <div class="content2 col-md-6" style="height: 50%; width: 500px;">
                    <div class="thumbnail">
                        <img src="data:image/jpeg;base64,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" alt=""/>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem Lipsum</p>
                                <p class="imgDesc">
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            <a href="#" class="btn btn-default">HEY</a> &nbsp; <a href="#" class="btn btn-default">You</a>
                        </div>
                    </div>
                </div>
                <div class="content3 col-md-6" style="height: 50%; width: 500px;">
                    <div class="thumbnail">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdvrSabjvPDKjtHDTDC2Cxu7-Jmf0SZkgy3FHZM6SFOpqe2H-2Pw" alt=""/>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem Lipsum</p>
                            <p class="imgDesc">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                            <a href="#" class="btn btn-default">HEY</a> &nbsp; <a href="#" class="btn btn-default">You</a>

                        </div>
                    </div>
                </div>
                <div class="content4 col-md-6" style="height: 50%; width: 500px;">
                    <div class="thumbnail">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd2dmZGB7reFCwhlf-OF7kHZfxcBizZFD_V6ecz7MQkW4RW-j5" alt=""/>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem Lipsum</p>
                            <p class="imgDesc">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                            <a href="#" class="btn btn-default">HEY</a> &nbsp; <a href="#" class="btn btn-default">You</a>
                        </div>
                    </div>
                </div>

                <div class="content5 col-md-6" style="height: 50%; width: 500px;">
                    <div class="thumbnail">
                        <img src="data:image/jpeg;base64,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" alt=""/>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lorem Lipsum</p>
                            <p class="imgDesc">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <a href="#" class="btn btn-default">HEY</a> &nbsp; <a href="#" class="btn btn-default">You</a>
                        </div>
                    </div>
                </div>


                <div class="anotherDataContent1 col-md-12">
                    <div class="images col-md-12" style="height: 100%; margin: 0 auto; padding: 0;">
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="0"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="1"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="2"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="3"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="4"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="5"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="6"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="7"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="8"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="9"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="10"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="11"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="12"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="13"/>
                        <img class="dataContent1Img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-xvBG0GuXE0SD-3iY6QJjdhahqfDDDe7bFTbhy-9byEN0zJvjA" alt="" id="14"/>

                    </div>
                </div>
                <div class="overlayItems" style="position: absolute; background: blue; height: 100%; width: 98%; opacity: 0.5; top: 1800px;">
                </div>
                <button id="overlay" style="position: relative; top: 935px;">Clicke Me!</button>
            </div>

        </div>
    </div>

    {!! HTML::script('assets/bootstrap/js/bootstrap.js') !!}

    <script>



        $(function() {

            $('#overlay').on('click', function(){
                $('.overlayItems').fadeToggle("slow");
            });

            $('.dataContent1Img').on('click', function(){
                $(this).animate({ 'zoom': 1.2 }, 400);
            });
            var win = $(window),
                windowH = win.height(),
                fullH = $(document).height(),
                elem = $('.anotherDataContent1');


            win.on("scroll", function() {
                animate_elems();
//                check_if_in_view();
            });

            function check_if_in_view() {
                var window_height = win.height();
                var window_top_pos = win.scrollTop();
                var window_bot_pos = (window_top_pos + window_top_pos);

                console.log(window_height);
                console.log(window_top_pos);
                console.log(window_bot_pos);
            }

            function animate_elems() {
                var winTop = win.scrollTop(),
                    currElem = $(this);
                var window_height = win.height();
                var window_top_position = win.scrollTop();
                var window_bottom_position = (window_top_position + window_height);

                var $element = $('.images');
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);


                if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                    $('.overlayItems').fadeOut("slow");
                }
//                console.log($(this).offset().top - (windowH * .75));
//                console.log($(this).offset().top)
//                console.log(windowH * .75)
//
//                elem.each(function () {
//
//
//                    if(currElem.hasClass('.animated'))
//                    {
//                        return true;
//                    }
//
//
//                    var topCoor = currElem.offset().top;
//
//                    if(winTop > (topCoor - (windowH *.75)))
//                        currElem.addClass('animated')
//                });
            }
        });



//        $(document).on (
//                'mousemove', function(event) {
//                    $('#mouseFollow').css({
//                        'position': 'absolute',
//                        'left': event.pageX,
//                        'top': event.pageY-10
//                    });
//                }
//        );
//            $(window).on("load",function(){
//                alert('hahahahaha')
//            });

//        $(window).on('scroll', function(){
//            var me = $(this);
//
//            console.log(me.scrollTop())
//            console.log(me.height());
//        });

    </script>
</body>
</html>