@extends('backend.permissions.form')

@section('htmlheader_title')
    权限管理
@endsection

@section('contentheader_title')
    权限创建
@endsection

@section('contentheader_description')
    创建权限
@endsection

@section('permission_title')
    创建新权限
@endsection

@section('permission_action')
    {{ route('admin.setting.permission.store') }}
@endsection
