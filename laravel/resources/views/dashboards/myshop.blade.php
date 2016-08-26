@extends('layouts.master')
<style>
    #shopField {
        height: 100%;
        width: 100%;
    }

    .col-lg-4 {
        height: 100%;
        /*display: inline-block;*/
    }

    #wrapperSelections {
        height: 78%;
        width: 94%;
        position: absolute;
        top: 170px;
        margin: 0 auto;
        left: 60px;
    }
    img {
        height: 100%;
        width: 100%;
    }

    #headerSelection {
        width: 100%;
        height: 150px;
        text-align: center;
    }

    #hederTitle {
        position: absolute;
        margin: 0 auto;
        width: 100%;
        top: 60px;
        /*-webkit-animation: mymove 5s infinite;*/
        animation: mymove 1s infinite;
    }

    img {
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }
    img:hover {
        border-radius: 50%;
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }

    /* Chrome, Safari, Opera */
    @-webkit-keyframes mymove {
        0% {
            background: red;
        }
        50% {
            background: yellow;
        }
        100% {
            background: blue;
        }
    }

</style>
@section('content')
    <div class="row">
        <div id="shopField" class="col-lg-12">
            <div id="headerSelection">
                <div id="hederTitle"><h2>Games</h2></div>
            </div>
            <div id="wrapperSelections">
                <div class="col-lg-4">
                    <a href="{!! route('poker') !!}">
                        <img src="http://www.christchurchcasino.co.nz/uploads/images/gallery/20/poker1.jpg" alt="poker"/>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{!! route('roulette') !!}">
                        <img src="http://i.dailymail.co.uk/i/pix/2012/10/19/article-2220167-0000544600000CB2-871_634x409.jpg" alt="roullete"/>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{!! route('slot') !!}">
                        <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTbG9asQfnuOaYr6di3FJf-W5e6xvReEAAogUdEe3KQuY4JYRH3cg" alt="lottery"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

