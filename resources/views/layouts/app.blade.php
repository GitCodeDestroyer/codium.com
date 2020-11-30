<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Codium') }}</title>

    <link rel="icon" href="{{ asset('img/icon-small.png') }}">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dist/normalize-dist.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dist/animate-dist.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dist/default-style-dist.css') }}">
    {{-- Yield custom styles from view --}}
    @yield('styles')
</head>
<body>
<div id="app">
    {{-- Check with navType section availability, are we should render it? --}}
    @hasSection('nav-type')
        <div class="nav @yield('nav-type')" id="nav-link">
            <div class="logo wow fadeIn" data-wow-duration="1.5s">
                <a href="{{ url('/') }}">
                    @hasSection('logo')
                        <img src="{{ asset('img/home/logo.png') }}" alt="logo">
                    @else
                        <img src="{{ asset('img/logo.png') }}" alt="logo">
                    @endif
                    @sectionMissing('without-logo-text')
                        <h1>{{ config('app.name', 'Codium') }}</h1>
                    @endif
                </a>
            </div>
            {{-- If navigation's menus are another, '@yield' this navigation --}}
            @hasSection('nav-content')
                @yield('nav-content')
                {{-- Else, render default navigation --}}
            @else
                <div class="menu-btn"><span class="pe-7s-more"></span></div>
                <div class="menu default">
                    <a href="{{ url('/dashboard') }}">@lang('nav.myCourses')</a>
                    <a href="{{ url('/courses') }}">@lang('nav.allCourses')</a>
                    <a href="">@lang('nav.tour')</a>
                </div>
                <div class="menu responsive">
                    <a href="{{ url('/dashboard') }}">@lang('nav.myCourses')</a>
                    <a href="{{ url('/courses') }}">@lang('nav.allCourses')</a>
                    <a href="">@lang('nav.tour')</a>
                </div>
            @endif
            @if (Auth::check())
                <div class="account">
                    <a class="animated fadeInRight"><img src="{{ asset('img/icon.jpg') }}" alt=""></a>
                    {{-- <a class="animated fadeInRight"><img src="{{ url('storage/'.Auth::user()->avatar) }}" alt=""></a> --}}
                    <div class="account-overlay"></div>
                    <div class="account-popup">
                        <div class="triangle"></div>
                        <div class="list">
                            <a href="{{ url('account') }}"><span class="pe-7s-user"></span> {{ Auth::user()->name }}</a>
                            @if(Auth::user()->name === 'Admin')
                                <a href="{{ url('admin/') }}"><span
                                        class="pe-7s-science"></span> Admin Panel</a>
                            @endif
                            <a href="{{ url('account/statistics/') }}"><span
                                    class="pe-7s-graph1"></span> @lang('nav.statistics')</a>
                            <a href="{{ url('account/achievments/') }}"><span
                                    class="pe-7s-target"></span> @lang('nav.achievments')</a>
                            <a href="{{ url('account/settings/') }}"><span
                                    class="pe-7s-config"></span> @lang('nav.settings')</a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span
                                    class="pe-7s-left-arrow"></span> @lang('nav.logout')</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
    <div class="content">
        <div class="intro-loader"
             style="position:fixed;top:0;left:0;opacity:1;height:100%;width:100%;background:#fff;padding:0;z-index:100">
            <img src="{{ asset('img/logo.svg') }}" alt="icon"
                 style="opacity:1;height:150px;margin:calc(50vh - 110px) calc(50vw - 85px);animation:opacity 1.5s linear infinite">
        </div>
        {{-- '@yield' custom scripts --}}
        @yield('content')
        {{-- Sidebar visible in only default pages like a: dashboard, courses, tournaments and etc. --}}
        @hasSection('sidebar')
            @yield('sidebar')
        @endif
    </div>
</div>
<script src="{{ asset('js/dist/jquery-dist.js') }}"></script>
<script src="{{ asset('js/dist/wow-dist.js') }}"></script>
<script src="{{ asset('js/dist/ux-script-dist.js') }}"></script>
{{-- '@yield' custom scripts --}}
@yield('scripts')
</body>
</html>
