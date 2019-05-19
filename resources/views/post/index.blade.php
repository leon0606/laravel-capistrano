@extends('layout.main')
@section('content')
    <div class="col-sm-8 blog-main">
        <div>
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example" data-slide-to="1"></li>
                    <li data-target="#carousel-example" data-slide-to="2"></li>
                </ol><!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1557137125657&di=0ac7a7fe262b2b7ec7010aa198b117dd&imgtype=0&src=http%3A%2F%2Fimg4.duitang.com%2Fuploads%2Fblog%2F201403%2F20%2F20140320135645_YswQ8.jpeg" alt="..."/>
                        <div class="carousel-caption">...</div>
                    </div>
                    <div class="item">
                        <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1557137125657&di=6810000ab1cabdf93c1d633792dbe95f&imgtype=0&src=http%3A%2F%2Fpic.90sjimg.com%2Fback_pic%2F00%2F04%2F27%2F49%2F8868cd0089191594f00125bfe5a05e90.jpg" alt="..."/>
                        <div class="carousel-caption">...</div>
                    </div>
                    <div class="item">
                        <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1557137125656&di=482de55fe1b8efed8d8eac048662a6f1&imgtype=0&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F01935a587387aba801219c777877c8.jpg" alt="..."/>
                        <div class="carousel-caption">...</div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <div style="height: 20px;">
        </div>
        <div>
            @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="/user/{{$post->user_id}}">{{ $post->user->name }}</a></p>
                <p>
                    {!! str_limit($post->content,100,'...') !!}
                </p>
                <p class="blog-post-meta">赞 {{$post->zans_count}} | 评论 {{$post->comments_count}}</p>
            </div>
            @endforeach

            {{--分页--}}
            {{$posts->links()}}

        </div><!-- /.blog-main -->
    </div>
@endsection