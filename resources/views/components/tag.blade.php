<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__("Tags")}}</div>
    </div>
    <div class="clearfix"></div>
    <div class="fh5co_tags_all">
@foreach ($tags as $tag)
<a href="#" class="fh5co_tagg">{{$tag->name}}</a>
@endforeach
    </div>
  <x-popular />
</div>
