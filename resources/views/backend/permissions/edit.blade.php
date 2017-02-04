@extends('backend.permissions.form')

@section('htmlheader_title')
    权限管理
@endsection

@section('contentheader_title')
    权限编辑
@endsection

@section('contentheader_description')
    编辑权限
@endsection

@section('permission_title')
    编辑权限
@endsection

@section('permission_action')
    {{ route('admin.setting.permission.update', ['id' => $permission->id]) }}
@endsection
