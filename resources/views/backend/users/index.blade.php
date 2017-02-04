@extends('layouts.app')

@section('htmlheader_title')
    用户管理
@endsection

@section('contentheader_title')
    用户管理
@endsection

@section('contentheader_description')
    管理用户增删改
@endsection

@section('main-content')
    <div class="box bix-info">
        <div class="box-header">
            <h3 class="box-title">用户列表</h3>
            <div class="box-tools">
                <a href="{{ route('admin.setting.user.create') }}" class="btn btn-success"><span class="fa fa-user-plus"></span> 新增</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>用户名</th>
                    <th>邮箱</th>
                    <th>角色</th>
                    <th>操作</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="label label-success">{{ $role->display_name }}</span>
                        @endforeach    
                    </td>
                    <td>
{{--                        <a href="{{ route('admin.setting.user.associateRole') }}" class="btn btn-success"><span class="fa fa-search"></span></a>--}}
                        <a href="{{ route("admin.setting.user.edit", ['id' => $user->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                        <a href="{{ route("admin.setting.user.delete", ['id' => $user->id]) }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection