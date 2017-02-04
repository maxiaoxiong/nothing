@extends('backend.users.form')

@section('htmlheader_title')
    用户管理
@endsection

@section('contentheader_title')
    用户创建
@endsection

@section('contentheader_description')
    创建用户
@endsection

@section('article_title')
    创建新用户
@endsection

@section('user-title')
    新增用户
@endsection

@section('user-route')
    {{ route("admin.setting.user.store") }}
@endsection