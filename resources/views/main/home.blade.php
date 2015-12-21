@extends('layouts.master')
    @section('css')
        <style>
        body {
            background-color: gray;
            width: 100%;
            height: 100%;

        }
        .background {
            background-color: #666699;
            height: 400px;
            width: 800px;
            margin: 0 auto;
            position: relative;
            top: 300px;

        }
        </style>
    @stop
@section('content')
    <div class="row">
        <div class="background">

                <div class="form-group" style="width: 250px; top: 127px; left: 270px; position: absolute;">
                {!! Form::open(['route' => 'logIn']) !!}
                        {!! Form::label('Username: ') !!} {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        {!! Form::label('Password: ') !!} {!! Form::password('password', ['class' => 'form-control']) !!}
                        <br/>
                        {!! Form::submit('Login', ['class' => 'btn btn-primary', 'style' => 'position: absolute; left: 96px;']) !!}
                {!! Form::close() !!}
                </div>
                {{--<% product %>--}}
                {{--<div ng-controller="StoreController as store">--}}
                    {{--<% store.product.name %>--}}
                    {{--<% store.product.price %>--}}
                {{--</div>--}}

                {{--<div ng-repeat="gems in gem">--}}
                    {{--<% store.product.name %>--}}
                    {{--<% store.product.price %>--}}
                    {{--<% store.product.description %>--}}
                {{--</div>--}}
        </div>
    </div>
@stop

@section('js')

@stop