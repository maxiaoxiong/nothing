<!DOCTYPE html>

<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body class="skin-red-light sidebar-mini">
<div class="wrapper">
@inject('mainPresenter', 'App\Presenters\MainPresenter')
@include('layouts.partials.mainheader')

@include('layouts.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @include('layouts.partials.contentheader')

    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('layouts.partials.controlsidebar')

    @include('layouts.partials.footer')

</div><!-- ./wrapper -->

@section('scripts')
    @include('layouts.partials.scripts')
@show

@include('layouts.partials.pages.message')

@yield('self-scripts')
</body>
</html>