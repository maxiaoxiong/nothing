@extends('layouts.app')

@section('htmlheader_title')
    文章管理
@endsection

@section('contentheader_title')
    文章管理
@endsection

@section('contentheader_description')
    管理文章增删改
@endsection

@section('main-content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">文章列表</h3>
            <div class="box-tools">
                <a href="{{ route('admin.site.article.create') }}" class="btn btn-success">创建新文章</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>标题</th>
                    <th>作者</th>
                    <th>发布时间</th>
                    <th>最后更新</th>
                    <th>操作</th>
                </tr>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->user->name }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td>{{ $article->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.site.article.show', ['id' => $article->id]) }}" class="btn btn-success"><span
                                        class="fa fa-eye"></span></a>
                            <a href="{{ route('admin.site.article.edit', ['id' => $article->id]) }}" class="btn btn-warning"><span
                                        class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection