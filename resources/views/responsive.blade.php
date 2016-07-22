<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Responsive Design Test</title>
    {!! HTML::style('assets/bootstrap/css/bootstrap.css') !!}
    {!! HTML::script('assets/bootstrap/js/jquery-2.1.4.js') !!}

    <style>
        body {
            height: 300vh;
            width: 100%;
        }
        .responsive_bg{
            height: 100%;
            width: 100%;
            background: url('http://i.ytimg.com/vi/SO5g92LA_KA/maxresdefault.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position:center;
            overflow-x: hidden;
        }

        .firstContent {
            position: relative;
            height: 1000px;
            width: 99.2%;
            background: darkgray;
            top: 967px;

        }
    </style>
</head>

<body>
    <div class="responsive_bg">
        <div class="row">
            <iframe style="position: absolute; height: 1000px; width: 100%; z-index: 100000;" src="https://ogs01lab.casino.sbo/onyx_admin/login" frameborder="0"></iframe>
        </div>
    </div>




{!! HTML::script('assets/bootstrap/js/bootstrap.js') !!}

    <script>
        (function(w, d, $) {
            console.log(w, d, $);
        })(window, document, jQuery);
    </script>
</body>
</html>