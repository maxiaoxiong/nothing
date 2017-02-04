@extends('backend.articles.form')

@section('htmlheader_title')
    文章管理
@endsection

@section('contentheader_title')
    文章创建
@endsection

@section('contentheader_description')
    创建文章
@endsection

@section('article_title')
    创建新文章
@endsection

@section('article_action')
    {{ route('admin.site.article.store') }}
@endsection