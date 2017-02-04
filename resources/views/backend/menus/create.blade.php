@extends('backend.menus.form')

@section('htmlheader_title')
    菜单管理
@endsection

@section('contentheader_title')
    菜单创建
@endsection

@section('contentheader_description')
    创建菜单
@endsection

@section('article_title')
    创建新菜单
@endsection

@section('menu_action')
    {{ route('admin.setting.menu.store') }}
@endsection
