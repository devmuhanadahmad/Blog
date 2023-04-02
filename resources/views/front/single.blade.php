@extends('layouts.frontend')
@section('body')
<div id="fh5co-title-box" style="background-image: url(images/camila-cordeiro-114636.jpg); background-position: 50% 90.5px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="page-title">
        <img src="{{$post->image_url}}" alt="{{$post->title}}">
        <span>{{$post->created_at}}</span>
        <h2>{{$post->title}}</h2>
    </div>
</div>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <p>
{{$post->smallDes}}
                </p>
                <p>
                   {{$post->content}}
                </p>
            </div>
           <x-tag />
        </div>
    </div>
</div>
<x-trending />

@endsection
