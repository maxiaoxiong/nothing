<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            Xz - 生活记录
        @show
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="keywords" content="Php,Laravel,Js"/>
    <meta name="author" content="Xicode"/>
    <meta name="description" content="@section('description') Love programming,Love Life" @show/>

    {{-- 总样式文件 --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- 特殊js --}}
    <script src="js/modernizr.js"></script>

    {{-- 按需样式 --}}
    @yield('styles')

</head>
<body id="body">
<div id="wrap">

    {{-- 头部导航菜单加简介 --}}
    @include('layouts.partials.nav')

    <div class="container">

        {{-- notify --}}
        {{--@include('flash::message')--}}

        {{-- 内容部分 --}}
        <div class="content-outer">

            <div id="page-content" class="row {{ str_contains(request()->url(), 'portfolio') ? 'portfolio' : '' }}">
                @yield('content')
            </div>

        </div>


    </div>

</div>

{{-- 么么哒部分 --}}
@include('layouts.partials.section')

{{-- 页脚部分 --}}
@include('layouts.partials.footer')

{{-- 核心js --}}
<script src="{{ asset('js/app.js') }}"></script>

{{-- 按需js --}}
@yield('scripts')
</body>
</html>
