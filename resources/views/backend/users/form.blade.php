@extends('layouts.app')

@section('self-styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection

@section('main-content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('user-title')</h3>
        </div>
        <form action="@yield('user-route')" role="form" method="post">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">用户名称</label>
                    <input type="text" name="name" class="form-control" placeholder="用户名" value="{{ $user->name or '' }}">
                </div>
                <div class="form-group">
                    <label for="role_id">分配角色</label>
                    @inject('userPresenter', 'App\Presenters\UserPresenter')
                    <select name="role_id[]" id="role_id" style="width: 100%;" multiple="multiple" data-placeholder="选择角色" class="form-control select2">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {!! $userPresenter->judgeUserRoleAssociation($role->id, isset($user) ? $user : null) !!}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">电子邮箱</label>
                    <input type="email" name="email" class="form-control" placeholder="电子邮箱" value="{{ $user->email or '' }}">
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" name="password" class="form-control" placeholder="密码" value="{{ $user->password or '' }}">
                </div>
                <div class="form-group">
                    <label for="repassword">重复密码</label>
                    <input type="password" class="form-control" placeholder="重复密码">
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
