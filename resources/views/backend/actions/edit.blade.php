@extends('backend.actions.form')

@section('htmlheader_title')
    操作管理
@endsection

@section('contentheader_title')
    操作编辑
@endsection

@section('contentheader_description')
    编辑操作
@endsection

@section('action_title')
    编辑操作
@endsection

@section('action_action')
    {{ route('admin.setting.action.update', ['id' => $action->id]) }}
@endsection

