@extends('layouts.app')

@section('main-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('category_title')</h3>
        </div>
        <div class="box-body">
            <form action="@yield('category_route')" method="post" role="form">

                <input type="hidden" name="id" value="{{ $category->id }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">栏目名</label>
                    <input type="text" name="name" class="form-control" placeholder="栏目名"
                           value="{{ $category->name or '' }}">
                </div>
                <div class="form-group">
                    <label for="img_url">栏目图片</label>
                    <input type="file" id="img_url" name="img_url" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">栏目描述</label>
                    <input type="text" name="desc" class="form-control" placeholder="栏目描述"
                           value="{{ $category->desc or '' }}">
                </div>
                <button type="reset" class="btn btn-default pull-left"><span class="fa fa-arrow-left"></span> 重置
                </button>
                <button type="submit" class="btn btn-success pull-right"><span class="fa fa-plus"></span> 创建</button>
            </form>
        </div>
    </div>
@endsection

