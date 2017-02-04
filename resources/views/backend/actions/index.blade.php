@extends('layouts.app')

@section('htmlheader_title')
    操作管理
@endsection

@section('contentheader_title')
    操作管理
@endsection

@section('contentheader_description')
    操作管理模块
@endsection

@section('main-content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">操作管理</h3>
            <div class="box-tools">
                <a href="{{ route('admin.setting.action.create') }}" class="btn btn-success">新增</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>操作名</th>
                    <th>操作分组</th>
                    <th>操作标识</th>
                    <th>是否显示</th>
                    <th>操作</th>
                </tr>
                @foreach($actions as $action)
                    <tr>
                        <td>{{ $action->id }}</td>
                        <td>{{ $action->name }}</td>
                        <td>{{ $action->group }}</td>
                        <td>{{ $action->action }}</td>
                        <td>{{ $action->status }}</td>
                        <td>
                            <a href="{{ route('admin.setting.action.edit', ['id' => $action->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                            <a href="{{ route('admin.setting.action.delete', ['id' => $action->id]) }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

