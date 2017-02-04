<div class="header">
    <header>

        <div class="row">

            <div class="twelve columns">

                <div class="logo">
                    <a href="#" style="font-size: 30px;">XiongZai.</a>
                </div>

                <nav id="nav-wrap">

                    <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
                    <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

                    <ul id="nav" class="nav">

                        <li><a href="#">首页</a></li>
                        <li class="{{ str_contains(request()->url(), 'blog') ? 'current' : '' }}"><a
                                    href="{{ route('blog') }}">博客</a></li>
                        <li class="{{ str_contains(request()->url(), 'portfolio') ? 'current' : '' }}"><span><a
                                        href="{{ route('portfolio') }}">资料包</a></span>
                            <ul>
                                <li><a href="#">资料包</a></li>
                                <li><a href="#">代表作</a></li>
                            </ul>
                        </li>
                        <li class="{{ str_contains(request()->url(), 'about') ? 'current' : '' }}"><a
                                    href="{{ route('about') }}">关于我</a></li>
                        <li class="{{ str_contains(request()->url(), 'contract') ? 'current' : '' }}"><a
                                    href="{{ route('contact') }}">联系我</a></li>
                        {{--<li><a href="styles.html">Features</a></li>--}}

                    </ul> <!-- end #nav -->

                </nav> <!-- end #nav-wrap -->

            </div>

        </div>

    </header>

    {{-- 网站说明 --}}
    <div id="page-title">

        <div class="row">

            <div class="ten columns centered text-center">
                <h1>熊仔小站<span>.</span></h1>

                <p>人们眼中的天才之所以卓越非凡，并非天资超人一等，而是付出了持续不断的努力.只要经过1万个小时的锤炼，任何人都能从
                    平凡变成超凡. </p>
            </div>

        </div>

    </div>
</div>
