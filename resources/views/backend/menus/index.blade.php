@extends('layouts.app')

@section('htmlheader_title')
    菜单管理
@endsection

@section('contentheader_title')
    菜单管理
@endsection

@section('contentheader_description')
    菜单管理模块
@endsection

@section('main-content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">菜单管理</h3>
            <div class="box-tools">
                <a href="{{ route('admin.setting.menu.create') }}" class="btn btn-success">新增</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>菜单名</th>
                    <th>菜单路由</th>
                    <th>菜单排位</th>
                    <th>是否显示</th>
                    <th>操作</th>
                </tr>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->route }}</td>
                        <td>{{ $menu->sort }}</td>
                        <td>{{ $menu->hide }}</td>
                        <td>
                            <a href="{{ route('admin.setting.menu.edit', ['id' => $menu->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                            <a href="{{ route('admin.setting.menu.delete', ['id' => $menu->id]) }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
