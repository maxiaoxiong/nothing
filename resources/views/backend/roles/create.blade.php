@extends('layouts.app')

@section('contentheader_title')
    创建角色
@endsection

@section('main-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">创建角色</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.setting.role.store') }}" method="post" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">角色标识</label>
                    <input type="text" name="name" class="form-control" placeholder="角色标识">
                </div>
                <div class="form-group">
                    <label for="display_name">角色名称</label>
                    <input type="text" name="display_name" class="form-control" placeholder="角色名称">
                </div>
                <div class="form-group">
                    <label for="description">角色描述</label>
                    <input type="text" name="description" class="form-control" placeholder="角色描述">
                </div>
                <button type="reset" class="btn btn-default pull-left"><span class="fa fa-arrow-left"></span> 重置</button>
                <button type="submit" class="btn btn-success pull-right"><span class="fa fa-plus"></span> 创建</button>
            </form>
        </div>
    </div>
@endsection

