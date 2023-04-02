<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{__("News")}}</div>
                </div>
                @foreach ($postAll as $post)

                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{$post->image_url}}" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="{{route('front.post.show',$post->id)}}" class="fh5co_magna py-2"> {{$post->title}}.<br> </a> <a href="{{route('front.post.show',$post->id)}}" class="fh5co_mini_time py-3"> {{$post->user->name}} -
                        {{$post->created_at}} </a>
                        <div class="fh5co_consectetur"> {{$post->smallDes}}.
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
          <x-tag />
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">

                {{$postAll->withQueryString()->links()}}

             </div>
        </div>
    </div>
</div>
