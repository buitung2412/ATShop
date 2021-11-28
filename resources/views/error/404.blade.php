@extends('layouts.site')

@section('title','404 Not Found!')

@section('main')


<div class="jumbotron">
    <div class="container">
        <h1>404 Not Found!</h1>
        <p>Contents ...</p>
        <p>
            <a href="{{route('home.index')}}" class="btn btn-primary btn-lg">Learn more</a>
        </p>
    </div>
</div>

@stop