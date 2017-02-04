@extends('layouts.default')

@section('content')

    {{-- 正文内容 --}}
    @include('layouts.partials.pages.content')

    {{-- 侧边栏 --}}
    @include('layouts.partials.pages.sidebar')

@endsection