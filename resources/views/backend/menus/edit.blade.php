@extends('backend.menus.form')

@section('htmlheader_title')
    菜单管理
@endsection

@section('contentheader_title')
    菜单编辑
@endsection

@section('contentheader_description')
    编辑菜单
@endsection

@section('article_title')
    编辑菜单
@endsection

@section('menu_action')
    {{ route('admin.setting.menu.update', ['id' => $menu->id]) }}
@endsection
