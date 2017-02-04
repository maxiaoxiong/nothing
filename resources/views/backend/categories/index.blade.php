@extends('layouts.app')

@section('htmlheader_title')
    栏目
@endsection

@section('contentheader_title')
    栏目管理
@endsection

@section('contentheader_description')
    管理栏目增删改
@endsection

@section('main-content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">栏目列表</h3>
            <div class="box-tools">
                <a href="{{ route('admin.site.category.create') }}" class="btn btn-success">创建新栏目</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>标签名</th>
                    <th>图片地址</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->img_url }}</td>
                        <td>{{ $category->desc }}</td>
                        <td>
                            <a href="{{ route('admin.site.category.edit', ['id' => $category->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection