

<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__('Categories')}}</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            @foreach ($categories as $category)

            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="{{$category->image_url}}" alt=""/></div>
                    <div>
                        <a href="#" class="d-block fh5co_small_post_heading"><span class="">{{$category->notes}}</span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i>{{$category->created_at}}</div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
