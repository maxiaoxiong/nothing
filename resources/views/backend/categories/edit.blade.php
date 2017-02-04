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
    编辑栏目
@endsection

@section('category_route')
    {{ route('admin.site.category.update', ['id' => $category->id]) }}
@endsection