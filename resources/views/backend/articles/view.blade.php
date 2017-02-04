<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<style>
    body {
        background: url("{{ asset('images/boxed-bg.jpg') }}") repeat fixed;
    }
    .wrapper {
        max-width: 800px;
        margin: 20px auto;
        min-height: 100%;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
        position: relative;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 10px;
    }
    .back {
        position: absolute;
        top: 20px;
        right: 40px;
    }
</style>
<body>
    <div class="wrapper">
        {!! $article->content_html !!}
    </div>
<button class="back btn btn-danger" onclick="back()"><- 返回上级</button>
<script>
    function back() {
        history.go(-1);
    }
</script>
</body>
</html>