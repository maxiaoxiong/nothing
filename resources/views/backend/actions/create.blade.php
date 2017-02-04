@extends('backend.actions.form')

@section('htmlheader_title')
    操作管理
@endsection

@section('contentheader_title')
    操作创建
@endsection

@section('contentheader_description')
    创建操作
@endsection

@section('action_title')
    创建新操作
@endsection

@section('action_action')
    {{ route('admin.setting.action.store') }}
@endsection

