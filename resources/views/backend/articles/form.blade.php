
@extends('layouts.app')

@section('ajax')
    <meta name="_token" content="{{ csrf_token() }}" xmlns="http://www.w3.org/1999/html"/>
@endsection

@section('self-styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/editormd/css/editormd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}">

@endsection

@section('style')
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            width: 300px;
            text-align: center;
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        #blah {
            border: 1px solid #dddddd;
            padding: 4px;
            background: #ffffff;
            transition: all 0.2s ease-in-out;
            display: inline-block;
        }
    </style>
@endsection

@section('main-content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('article_title')</h3>
        </div>
        <form class="form-horizontal" method="post" action="@yield('article_action')">
            {{ csrf_field() }}
            <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label col-md-1">标题</label>
                    <div class="col-md-11">
                        <input type="text" name="title" id="title" value="{{ $article->title or '' }}" class="form-control" placeholder="标题">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 control-label">分类</label>
                    <div class="col-md-11">
                        <select class="form-control select2" name="category_id[]" multiple data-placeholder="选择分类"
                                style="width: 100%;">
                            @inject('articlePresenter', 'App\Presenters\ArticlePresenter')
                            @foreach($categories as $k => $v)
                                <option value="{{ $k }}" {!! $articlePresenter->judgeCategorySelected(isset($article) ? $article : null, $k) !!}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">图片</label>
                    <div class="col-md-11" id="overlay">
                        <img src="{{ $article->img_url or '' }}" alt="" width="300" height="200" id="blah"><br>
                        <label for="article_img" class="custom-file-upload"><span class="fa fa-cloud-upload"></span>
                            上传图片</label>
                        <input type="file" id="article_img" name="article_img" class="form-control">
                        <input type="hidden" name="img_url" id="article_img_url" value="{{ $article->img_url or '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label col-md-1">描述</label>
                    <div class="col-md-11">
                        <textarea name="desc" class="form-control" placeholder="文章描述">{{ $article->desc or '' }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datetimepicker" class="control-label col-md-1">发布日期</label>
                    <div class="col-md-11">
                        <input type="text" value="{{ $article->published_at or '' }}" name="published_at" class="form-control" id="datetimepicker">
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="tags" class="control-label col-md-1">标签</label>--}}
                    {{--<div class="col-md-11">--}}
                        {{--<select class="form-control select2-tags" name="tags[]" multiple data-placeholder="选择分类">--}}

                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="content" class="col-md-1 control-label">内容</label>
                    <div class="col-md-11">
                        <div id="content">
                            <textarea name="content">{{ $article->content or '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button class="btn btn-default pull-left" type="reset"><span class="fa fa-refresh"></span> 重置</button>
                    <button class="btn btn-success pull-right" type="submit"><span class="fa fa-plus"></span> 提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('self-scripts')
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/editormd/editormd.min.js') }}"></script>
    <script src="{{ asset('js/plupload.full.min.js') }}"></script>
    <script src="{{ asset('js/qiniu.js') }}"></script>
    <script src="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>

        $(".select2").select2();
//        $(".select2-tags").select2({
//            tags: true
//        });

        $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss'
        });
        var articleContent;

        $(function () {
            articleContent = editormd("content", {
                width: "100%",
                height: 640,
                syncScrolling: "single",
                path: "{{ env('EDITORMD_LIB_DIR') }}",
                toolbarAutoFixed: false,
                saveHTMLToTextarea: true,
                codeFold: true,
                searchReplace: true,
                emoji: true,
                taskList: true,
                tocm: true,         // Using [TOCM]
                tex: true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart: true,             // 开启流程图支持，默认关闭
                sequenceDiagram: true,
                imageUpload: true,
                imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL: "{{ route('admin.upload') }}"

            });
            articleContent.getHTML();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var that = input.files[0];
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result)
                            .after('<div id="con">' +
                                    '<p id="fileName">' + that.name + '</p>' +
                                    '<div class="progress">' +
                                    '<div id="progress" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0">' +
                                    '<span class="sr-only">45% Complete</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '<p id="fileSize" "><b>' + (Math.round(that.size / 1024)).toFixed(1) + '</b> Kb</p>' +
                                    '<div id="HandleButton">' +
                                    '<label onclick="upload()" class="btn btn-primary"><span class="fa fa-upload"></span> 上传</label> ' +
                                    '<label onclick="reset()" class="btn btn-warning"><span class="fa fa-close"></span> 取消</label>' +
                                    '</div></div>')
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function reset() {
            console.log('ss');
            $("#blah").attr('src', 'article_img');
            $("#con").remove();
            $(".custom-file-upload").css('display', 'block');
        }

        function upload() {
            var theFile = document.getElementById('article_img').files[0];
            var formData = new FormData();
            formData.append('imgFile', theFile);
            $.ajax({
                url: '{{ route('admin.upload') }}',
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (e) {
                        if (e.lengthComputable) {
                            var percentComplete = e.loaded / e.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $("#progress").css('width', percentComplete + '%');
                            if (percentComplete === 100) {
                                console.log('进度条走完');
                            }
                        }

                    }, false);
                    return xhr;
                },
                success: function (data) {
                    $("#article_img_url").val('{{ env('APP_URL') }}' + '/' + data.message.key);
                    pnotify(data);
                    $("#con").remove();
                    $(".custom-file-upload").html('<span class="fa fa-refresh"></span> 重新上传').css('display', 'block').css('background-color', '#e5b60d')
                            .css('color', '#ffffff');
                },
                error: function () {
                    var data = {
                        title: '出现错误',
                        text: 'ajax 请求出现错误，请联系管理员',
                        type: 'error'
                    };
                    pnotify(data);
                }
            });
        }

        function pnotify(data) {

            new PNotify({
                title: data.title,
                text: data.text,
                type: data.type,
                styling: 'bootstrap3'
            });
        }

        $("#article_img").change(function () {
            readURL(this);
            $(".custom-file-upload").css('display', 'none');
        });

    </script>
@endsection