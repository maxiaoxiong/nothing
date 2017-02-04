@extends('layouts.app')

@section('htmlheader_title')
    权限管理
@endsection

@section('contentheader_title')
    权限管理
@endsection

@section('contentheader_description')
    权限管理模块
@endsection

@section('main-content')
    <div class="box box-success">
        <div class="box-header">
            <div class="box-title">
                <form class="form-inline" action="" role="form">
                    <div class="input-group">
                        <span class="input-group-addon">id</span>
                        <input type="text" class="form-control" placeholder="权限id">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">标识</span>
                        <input type="text" class="form-control" placeholder="权限标识">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">权限名</span>
                        <input type="text" class="form-control" placeholder="权限名">
                    </div>
                    <button class="btn btn-success" type="submit"><span class="fa fa-search"></span></button>
                </form>
            </div>
            <div class="box-tools">
                <a href="{{ route('admin.setting.permission.create') }}" class="btn btn-success">新增</a>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>权限id</th>
                    <th>权限标识</th>
                    <th>权限类型</th>
                    <th>权限名</th>
                    <th>权限描述</th>
                    <th>操作</th>
                </tr>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->type }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <a href="{{ route('admin.setting.permission.associate', ['id' => $permission->id]) }}" class="btn btn-instagram"><span class="fa fa-key"></span></a>
                            <a href="{{ route('admin.setting.permission.edit', ['id' => $permission->id]) }}" class="btn btn-info"><span class="fa fa-edit"></span></a>
                            <a href="{{ route('admin.setting.permission.delete', ['id' => $permission->id]) }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection