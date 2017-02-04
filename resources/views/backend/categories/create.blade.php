@extends('backend.categories.form')

@section('htmlheader_title')
    栏目管理
@endsection

@section('contentheader_title')
    栏目管理
@endsection

@section('contentheader_description')
    管理栏目增删改
@endsection

@section('category_title')
    新建栏目
@endsection

@section('category_route')
    {{ route('admin.site.category.store') }}
@endsection