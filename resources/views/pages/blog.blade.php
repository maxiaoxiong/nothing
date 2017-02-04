@extends('layouts.default')

@section('content')

             {{-- 主文章部分 --}}
            @include('layouts.partials.pages.article')

             {{-- 侧边栏部分 --}}
            @include('layouts.partials.pages.sidebar')

@endsection