<!DOCTYPE html>
<html ng-app="app">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>@yield('title')</title>
    {!! HTML::style('assets/bootstrap/css/bootstrap.css') !!}
    {!! HTML::style('assets/easyui/themes/default/easyui.css') !!}
    {!! HTML::style('assets/easyui/themes/icon.css') !!}


    {!! HTML::script('assets/bootstrap/js/jquery-2.1.4.js') !!}
    {!! HTML::script('assets/easyui/jquery.min.js') !!}
    {!! HTML::script('assets/easyui/jquery.easyui.min.js') !!}

</head>
    {{--{!! HTML::script('assets/easyui/jquery.easyui.mobile.js') !!}--}}
    <style>
        .container {
            position: relative;
            width: 100%;
            height: 90%;
            background: rgba(49, 91, 190, 0.3);
            background-attachment: fixed;
        }
    </style>
        @yield('css')

<body ng-controller="StoreController as store">

    <div class="container">

    @yield('content')
    </div>
    @include('navbar.footer')





    {!! HTML::script('assets/bootstrap/js/bootstrap.js') !!}

    {!! HTML::script('assets/angular.js') !!}
    <script>
        (function(){
            var app = angular.module('app', [], function($interpolateProvider){
                $interpolateProvider.startSymbol('<%');
                $interpolateProvider.endSymbol('%>');
            });

            app.controller('StoreController', function($scope){
                $scope.product = gems;
                setInterval(function() {
                    $scope.$apply(function() {
                        $scope.product[0].price = 0.00;
                    })
                }, 1000)


            });

            var gems = [
                {
                    name: 'Dodecahedron',
                    price: 2.95,
                    description: 'WTF'
                },
                {
                    name: 'Diamond',
                    price: 5.30,
                    description: 'So precious you can\'t buy these'
                }
            ];
        })();

    </script>

    @yield('js')
</body>
</html>