@extends('layouts.app')

@section('self-styles')
    <link rel="stylesheet" href="{{ asset('css/zTreeStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-zTree.css') }}">
@endsection

@section('htmlheader_title')
    权限管理
@endsection

@section('contentheader_title')
    权限关联
@endsection

@section('contentheader_description')
    关联菜单
@endsection

@section('main-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">菜单权限</h3>
            <div class="box-tools">
                <button id="check-all-true" type="button" class="btn btn-sm btn-flat btn-info">全选</button>
                <button id="check-all-false" type="button" class="btn btn-sm btn-flat btn-warning">全删</button>
            </div>
        </div>
        <div class="box-body">
            <ul id="tree" class="ztree"></ul>
        </div>
        <div class="box-footer">
            <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">
                <i class="fa fa-arrow-left"></i>
                返回
            </a>
            <button id="save-menu-permission" type="button" class="btn btn-flat btn-success pull-right">
                <i class="fa fa-pencil"></i>
                赋权
            </button>
        </div>
    </div>
@endsection

@section('self-scripts')
    <script src="{{ asset('js/jquery.ztree.all-3.5.min.js') }}"></script>
    <script>
        var id = {{ $id }};
        var nodes = {!! $data !!};
        var setting = {
            check: {
                enable: true,
                chkboxType: {"Y": "ps", "N": "ps"}
            },
            data: {
                simpleData: {
                    enable: true
                }
            }
        };

        $(document).ready(function () {
            $.fn.zTree.init($("#tree"), setting, nodes);
            var zTree = $.fn.zTree.getZTreeObj("tree");

            $('#check-all-true').click(function () {
                zTree.checkAllNodes(true);
            });

            $('#check-all-false').click(function () {
                zTree.checkAllNodes(false);
            });

            $('#save-menu-permission').click(function () {
                var tree = zTree.getCheckedNodes(true);
                var menus = [];
                for (var i = 0; i < tree.length; i++) {
                    menus.push(tree[i].id);
                }
                $.ajax({
                    data: {id: id, menus: menus},
                    url: "{{route('admin.setting.permission.associate.menus')}}",
                    success: function (data) {
                        pnotify(data);
                    },
                    error: function (data) {
                        pnotify(data);
                    }
                });
            });
        });

        function pnotify(data) {

            new PNotify({
                title: data.title,
                text: data.text,
                type: data.type,
                styling: 'bootstrap3'
            });
        }
    </script>
@endsection
