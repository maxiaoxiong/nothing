@extends('layouts.app')

@section('self-styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

@endsection
@section('main-content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">创建新菜单</h3>
        </div>
        <form action="@yield('menu_action')" method="post" role="form">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="parent_id">父级菜单</label>
                    <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                        <option value="0" selected>顶级分类</option>
                        @foreach($formatMenus as $item)
                            <option value="{{ $item->id }}" @if(isset($menu)) @if($menu->id == $item->id) selected @endif @endif>{{ $item->html }} {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">菜单名称</label>
                    <input type="text" name="name" class="form-control" placeholder="菜单名称" value="{{ $menu->name or '' }}">
                </div>
                <div class="form-group">
                    <label for="desc">菜单描述</label>
                    <input type="text" name="desc" class="form-control" placeholder="菜单描述" value="{{ $menu->desc or '' }}">
                </div>
                <div class="form-group">
                    <label for="route">菜单路由</label>
                    <input type="text" name="route" class="form-control" placeholder="菜单路由" value="{{ $menu->route or '' }}">
                </div>
                <div class="form-group">
                    <label for="icon">菜单图标</label>
                    <input type="text" name="icon" class="form-control" placeholder="菜单图标" value="{{ $menu->icon or '' }}">
                </div>
                <div class="form-group">
                    <label for="sort">菜单排序</label>
                    <input type="text" name="sort" class="form-control" value="{{ $menu->sort or '0' }}" placeholder="菜单排序">
                </div>
                <div class="form-group">
                    <label for="hide">是否隐藏</label>
                    <select class="form-control select2" name="hide" id="hide">
                        <option value="显示" @if(isset($menu)) @if($menu->hide == '显示') selected @endif @endif>显示</option>
                        <option value="隐藏" @if(isset($menu)) @if($menu->hide == '隐藏') selected @endif @endif>隐藏</option>
                    </select>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-default pull-left" type="reset"><span class="fa fa-arrow-left"></span> 重置</button>
                <button class="btn btn-success pull-right" type="submit"><span class="fa fa-plus"></span> 新增</button>
            </div>
        </form>
    </div>
@endsection

@section('self-scripts')
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(".select2").select2();
    </script>
@endsection
