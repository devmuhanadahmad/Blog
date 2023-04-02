<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__("Trending")}}</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
          @foreach ($posts as $post)
          <div class="item px-2">
            <div class="fh5co_latest_trading_img_position_relative">
                <div class="fh5co_latest_trading_img"><img src="{{$post->image_url}}" alt="{{$post->title}}"
                                                       class="fh5co_img_special_relative"/></div>
                <div class="fh5co_latest_trading_img_position_absolute"></div>
                <div class="fh5co_latest_trading_img_position_absolute_1">
                    <a href="{{route('front.post.show',$post->id)}}" class="text-white"> {{$post->title}}</a>
                    <div class="fh5co_latest_trading_date_and_name_color"> {{$post->user->name}} - {{$post->created_at}}</div>
                </div>
            </div>
        </div>

          @endforeach
        </div>
    </div>
</div>
