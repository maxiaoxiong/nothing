<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                    </a>
                </div>
            </div>
    @endif

    <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control"
                       placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        {{--<ul class="sidebar-menu">--}}
            {{--<li class="header">{{ trans('adminlte_lang::message.header') }}</li>--}}
            {{--<!-- Optionally, you can add icons to the links -->--}}
            {{--<li class="{{ active_class(if_route('admin.home')) }}"><a href="{{ route('admin.home') }}"><i--}}
                            {{--class='fa fa-dashboard'></i>--}}
                    {{--<span>{{ trans('messages.sidebar.dashboard') }}</span></a></li>--}}
            {{--@if(Auth::user()->hasRole('super-admin'))--}}
                {{--<li class="treeview {{ active_class(if_route_pattern('admin.setting.*')) }}">--}}
                    {{--<a href="#"><span class='fa fa-desktop'></span>--}}
                        {{--<span>{{ trans('messages.sidebar.setting.title') }}</span> <i--}}
                                {{--class="fa fa-angle-left pull-right"></i></a>--}}
                    {{--<ul class="treeview-menu">--}}

                        {{--<li><a href="{{ route('admin.setting.menu.index') }}"><span--}}
                                        {{--class="fa fa-list-ul"></span> {{ trans('messages.sidebar.setting.menu') }}</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="{{ route('admin.setting.role.index') }}"> <span--}}
                                        {{--class="fa fa-users"></span> {{ trans('messages.sidebar.setting.role') }}</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="{{ route('admin.setting.permission.index') }}"> <span--}}
                                        {{--class="fa fa-eye-slash"></span> {{ trans('messages.sidebar.setting.permission') }}--}}
                            {{--</a></li>--}}
                        {{--<li><a href="{{ route('admin.setting.user.index') }}"> <span--}}
                                        {{--class="fa fa-user"></span> {{ trans('messages.sidebar.setting.user') }}</a></li>--}}
                        {{--<li><a href="{{ route('admin.setting.action.index') }}"><span--}}
                                        {{--class="fa fa-wrench"></span> {{ trans('messages.sidebar.setting.operation') }}--}}
                            {{--</a></li>--}}
                        {{--<li><a href="/log-viewer"><span class="fa fa-bug"></span>--}}
                                {{--<span>{{ trans('messages.sidebar.setting.log') }}</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--@endif--}}
            {{--<li class="treeview {{ active_class(if_route_pattern('admin.site.*')) }}">--}}
                {{--<a href="#"><span class="fa fa-sitemap"></span> <span>{{ trans('messages.sidebar.site.title') }}</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i></a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{ route('admin.site.article.index') }}"><i class="fa fa-file-text-o"></i>--}}
                            {{--<span>{{ trans('messages.sidebar.site.article') }}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="{{ route('admin.site.category.index') }}"><i class="fa fa-list"></i>--}}
                            {{--<span>{{ trans('messages.sidebar.site.category') }}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-long-arrow-up"></i>--}}
                            {{--<span>{{ trans('messages.sidebar.site.visitor') }}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-comments"></i>--}}
                            {{--<span>{{ trans('messages.sidebar.site.comment') }}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        {{--</ul><!-- /.sidebar-menu -->--}}
        {!! $mainPresenter->renderSidebar($menus, $route) !!}

    </section>
    <!-- /.sidebar -->
</aside>
