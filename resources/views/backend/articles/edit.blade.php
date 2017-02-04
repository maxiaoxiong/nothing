@extends('backend.articles.form')

@section('htmlheader_title')
    文章管理
@endsection

@section('contentheader_title')
    文章编辑
@endsection

@section('contentheader_description')
    编辑文章
@endsection

@section('article_title')
    编辑文章
@endsection

@section('article_action')
    {{ route('admin.site.article.update', ['id' => $article->id]) }}
@endsection