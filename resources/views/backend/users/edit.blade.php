@extends('backend.users.form')

@section('htmlheader_title')
    用户管理
@endsection

@section('contentheader_title')
    用户编辑
@endsection

@section('contentheader_description')
    编辑用户
@endsection

@section('article_title')
    编辑用户
@endsection

@section('user-title')
    编辑用户
@endsection

@section('user-route')
    {{ route("admin.setting.user.update", ['id' => $user->id]) }}
@endsection