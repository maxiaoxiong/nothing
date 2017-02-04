<div id="primary" class="eight columns">
    @foreach($articles as $article)
        <article class="post">

            <div class="entry-header cf">

                <h1><a href="{{ route('blog.article.show',['id' => $article->id]) }}" title="">{{ $article->title }}</a></h1>

                <p class="post-meta">

                    <time class="date">{{ $article->created_at }}</time>
                    /
                     <span class="categories">
                     @foreach($article->categories as $category)
                             <a href="#">{{ $category->name }}</a> /
                             {{--<a href="#">User Inferface</a> /--}}
                             {{--<a href="#">Web Design</a>--}}
                         @endforeach
                     </span>

                </p>

            </div>

            <div class="post-thumb">
                <a href="{{ route('blog.article.show',['id' => $article->id]) }}" title=""><img
                            src="{{ $article->img_url }}?imageView2/1/w/640/h/246/interlace/0/q/100" alt="post-image"
                            title="post-image"></a>
            </div>

            <div class="post-content">

                <p>{{ $article->desc }} </p>

            </div>

        </article> <!-- post end -->
    @endforeach

    {{--<article class="post">--}}

    {{--<div class="entry-header cf">--}}

    {{--<h1><a href="single.html" title="">Proin gravida nibh vel velit auctor aliquet Aenean sollicitudin auctor.</a></h1>--}}

    {{--<p class="post-meta">--}}

    {{--<time class="date" datetime="2014-01-14T11:24">Jan 14, 2013</time>--}}
    {{--/--}}
    {{--<span class="categories">--}}
    {{--<a href="#">Design</a> /--}}
    {{--<a href="#">User Inferface</a> /--}}
    {{--<a href="#">Web Design</a>--}}
    {{--</span>--}}

    {{--</p>--}}

    {{--</div>--}}

    {{--<div class="post-thumb">--}}
    {{--<a href="single.html" title=""><img src="images/post-image/post-image-1300x500-02.jpg" alt="post-image" title="post-image"></a>--}}
    {{--</div>--}}

    {{--<div class="post-content">--}}

    {{--<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,--}}
    {{--nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate--}}
    {{--cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a--}}
    {{--ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>--}}

    {{--</div>--}}

    {{--</article> <!-- post end -->--}}

    {{--<article class="post">--}}

    {{--<div class="entry-header cf">--}}

    {{--<h1><a href="single.html" title="">Proin gravida nibh vel velit auctor aliquet Aenean sollicitudin auctor.</a></h1>--}}

    {{--<p class="post-meta">--}}

    {{--<time class="date" datetime="2014-01-14T11:24">Jan 14, 2014</time>--}}
    {{--/--}}
    {{--<span class="categories">--}}
    {{--<a href="#">Design</a> /--}}
    {{--<a href="#">User Inferface</a> /--}}
    {{--<a href="#">Web Design</a>--}}
    {{--</span>--}}

    {{--</p>--}}

    {{--</div>--}}

    {{--<div class="post-thumb">--}}
    {{--<a href="single.html" title=""><img src="images/post-image/post-image-1300x500-03.jpg" alt="post-image" title="post-image"></a>--}}
    {{--</div>--}}

    {{--<div class="post-content">--}}

    {{--<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,--}}
    {{--nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate--}}
    {{--cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a--}}
    {{--ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>--}}

    {{--</div>--}}

    {{--</article> <!-- post end -->--}}

<!-- Pagination -->
    {{ $articles->links('vendor.pagination.bootstrap-4') }}

</div>