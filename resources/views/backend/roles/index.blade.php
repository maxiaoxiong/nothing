@extends('layouts.app')

@section('self-styles')
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <style>
        .checkbox {
            padding: 10px;
        }
        .checkbox > label{
            margin-right: 20px;
        }
        .r1 {
            text-align: center;
        }
    </style>
@endsection

@section('htmlheader_title')
    角色管理
@endsection

@section('contentheader_title')
    角色管理
@endsection

@section('contentheader_description')
    管理角色增删改
@endsection

@section('main-content')
    <div class="box box-success">
        <div class="box-header">
            <div class="box-title">
                <form class="form-inline" action="" role="form">
                    <div class="input-group">
                        <span class="input-group-addon">id</span>
                        <input type="text" class="form-control" placeholder="角色id">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">标识</span>
                        <input type="text" class="form-control" placeholder="角色标识">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">角色名</span>
                        <input type="text" class="form-control" placeholder="角色名">
                    </div>
                    <button class="btn btn-success" type="submit"><span class="fa fa-search"></span></button>
                </form>
            </div>
            <div class="box-tools">
                <a href="{{ route('admin.setting.role.create') }}" class="btn btn-success">新增</a>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>角色id</th>
                    <th>角色标识</th>
                    <th>角色名</th>
                    <th>角色描述</th>
                    <th>操作</th>
                </tr>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#permissions" data-id="{{ $role->id }}" class="btn btn-success"><span class="fa fa-archive"></span></button>
                            <a href="#" class="btn btn-info"><span class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@include('backend.components.modal', ['modelTitle' => '分配权限', 'modelContent' => 'backend/roles/rolePermission', 'route' => route('admin.setting.role.associatePermission')])

@section('self-scripts')
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $('#permissions').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            $.ajax({
                url: '/admin/setting/role/'+id+'/getRoleHasPermission/',
                method: 'GET',
                success: function (data) {
                    var rolePermissionIds = data.arr;
                    var permissions = $('.permissions');
                    $.each(permissions, function (key, val) {
                        if (rolePermissionIds.indexOf(parseInt($(this).val())) >= 0) {
                            $(this).attr('checked', 'checked');
                        }
                    })
                }
            });

            var modal = $(this);
            modal.find('#role_id').val(id)
        })
    </script>
@endsection
