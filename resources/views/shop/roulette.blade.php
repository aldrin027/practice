<!DOCTYPE html>
<html>
<meta charset="UTF-8"/>

{{--<meta http-equiv="refresh" content="3" />--}}
<title>@yield('title')</title>
{!! HTML::style('assets/bootstrap/css/bootstrap.css') !!}
{!! HTML::script('assets/bootstrap/js/jquery-2.1.4.js') !!}

<style>

    body, html {
        height: 100%;
    }
    .parent_box {
        position: relative;

    }
    .child1{
        background-image: url('http://orig13.deviantart.net/8347/f/2015/004/a/d/dota2___windranger_by_chrissimon-d8coj8f.jpg');
    }

    .child2 {
        background-image: url('http://2.bp.blogspot.com/-EFmfkOPcirw/U5CVACoUgcI/AAAAAAAAKoY/VB5jV-88ZNg/s2560/storm-spirit-vestments-of-the-living-lightning-1920x1080.jpg');
    }

    .child3 {
        background-image: url('https://i.ytimg.com/vi/Dq39YDb33Mg/maxresdefault.jpg');
    }

    .parent_box [class*="child"] {
        position: relative;
        height: 1000px;
        background-attachment: fixed;
        background-size: cover;
        /*background-position: top center;*/

    }
    
    .try1 {
        position: absolute;
        background-color: #ffffff;
        top: 500px;
    }

</style>
<body>

<div class="parent_box">
    <div class="child1">
        <div class="try1">
            <section>
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h2>
            </section>
        </div>
    </div>
    <div class="child2"></div>
    <div class="child3"></div>
</div>


{!! HTML::script('assets/bootstrap/js/bootstrap.js') !!}
<script>
    (function(){
        var documentElement = $(document),
                parallax = $(this).find('.child');

        documentElement.on('scroll', function(){
            var currScrollPos = documentElement.scrollTop();
            parallax.css('background-position', '0 ' + -currScrollPos / 4);
        });
    })();

</script>

</body>
</html>