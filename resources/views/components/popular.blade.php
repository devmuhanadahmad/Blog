<div>
    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">{{__("Most Popular")}}</div>
</div>
@foreach ($posts as $post)
<div class="row pb-3">
<div class="col-5 align-self-center">
    <img src="{{$post->image_url}}" alt="{{{$post->title}}}" class="fh5co_most_trading" />
</div>
<div class="col-7 paddding">
    <div class="most_fh5co_treding_font">{{{$post->title}}}</div>
    <div class="most_fh5co_treding_font_123"> {{$post->created_at}}</div>
</div>
</div>
@endforeach
