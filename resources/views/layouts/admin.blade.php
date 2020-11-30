@extends('layouts.app')

@section('title', 'Интерактивные уроки по веб разработке ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dist/admin-style-dist.css') }}">
@stop

@section('nav-type', 'transparent')

{{--@section('nav-type', 'transparent')--}}
@section('without-logo-text', true)

@section('styles')
    <style>
        .account-popup {
            height: auto
        }
    </style>
@stop

@section('nav-content')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
@stop

@section('content')
    <div class="sidebar">
        <p>Данные <span class="pe-7s-angle-down"></span></p>
        @php
            $active = isset($location) ? $location : 'home';
        @endphp
        <a href="{{ route('admin') }}" class="@if($active == 'home') active @endif">Курсы</a>
        <a href="">Структура курсов</a>
        <a href="">Документация</a>
        <p>Добавить <span class="pe-7s-angle-down"></span></p>
        <a href="{{ route('admin_show_new_course') }}" class="@if ($active == 'course') active @endif">Новый курс</a>
        <a href="">Новый урок</a>
        <a href="">Новое упражнение</a>
        <a href="">Новый тест</a>
    </div>
    <div class="admin-content">
        @yield('admin-content')
    </div>
@stop
