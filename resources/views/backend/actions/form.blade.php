
@extends('layouts.app')

@section('self-styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

@endsection
@section('main-content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('action_title')</h3>
        </div>
        <form action="@yield('action_action')" method="post" role="form">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="group">操作分组</label>
                    <select name="group" id="group" class="form-control select2" style="width: 100%;" data-placeholder="操作分组">
                        @foreach(config('self.action-group') as $key => $val)
                            <option value="{{ $key }}" @if(isset($action)) @if($action->group == $key) selected @endif @endif>{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">操作名称</label>
                    <input type="text" name="name" class="form-control" value="{{ $action->name or '' }}" placeholder="操作名称">
                </div>
                <div class="form-group">
                    <label for="desc">操作描述</label>
                    <input type="text" name="desc" class="form-control" value="{{ $action->desc or '' }}" placeholder="操作描述">
                </div>
                <div class="form-group">
                    <label for="action">操作标识</label>
                    <input type="text" name="action" class="form-control" value="{{ $action->action or '' }}" placeholder="操作标识">
                </div>
                <div class="form-group">
                    <label for="status">是否禁用</label>
                    <select class="form-control select2" name="status" id="status">
                        <option value="0" @if(isset($action) && $action->status == 0) selected @endif>启用</option>
                        <option value="1" @if(isset($action) && $action->status == 1) selected @endif>禁用</option>
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