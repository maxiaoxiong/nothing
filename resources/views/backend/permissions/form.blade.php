@extends('layouts.app')
@section('self-styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

@endsection
@section('main-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('permission_title')</h3>
        </div>
        <div class="box-body">
            <form action="@yield('permission_action')" role="form" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">权限标识</label>
                    <input type="text" name="name" class="form-control" value="{{ $permission->name or '' }}" placeholder="权限标识">
                </div>
                <div class="form-group">
                    <label for="type">权限类型</label>
                    <select class="form-control select2" name="type" id="type">
                        @foreach(config('self.permission-type') as $key => $val)
                            <option value="{{ $key }}" @if(isset($permission) && $permission->type == $key) selected @endif>{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="display_name">权限名称</label>
                    <input type="text" name="display_name" class="form-control" value="{{ $permission->display_name or '' }}" placeholder="权限名称">
                </div>
                <div class="form-group">
                    <label for="description">权限描述</label>
                    <input type="text" name="description" class="form-control" value="{{ $permission->description or '' }}" placeholder="权限描述">
                </div>
                <button type="reset" class="btn btn-default pull-left"><span class="fa fa-arrow-left"></span> 重置</button>
                <button type="submit" class="btn btn-success pull-right"><span class="fa fa-plus"></span> 创建</button>
            </form>
        </div>
    </div>
@endsection

@section('self-scripts')
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(".select2").select2();
    </script>
@endsection