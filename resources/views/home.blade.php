@extends('layouts.app')

@section('title', 'Интерактивные уроки по веб разработке ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/src/home-style.css') }}">
@stop

@section('nav-type', 'transparent')
@section('logo', '1')

@section('nav-content')
    <div class="menu wow fadeIn" data-wow-duration="2s">
        <a href="">{{ __('nav.demo') }}</a>
        <a href="#section-1">{{ __('nav.about') }}</a>
        <a href="">{{ __('nav.forum') }}</a>
        <a href="{{ route('login') }}">{{ __('nav.login') }}</a>
        <a href="{{ route('register') }}" class="btn">{{ __('nav.register') }}</a>
    </div>
@stop

@section('content')
        <div class="hero">
            <div class="content">
                <h1 class="wow fadeInLeft" data-wow-duration="1.5s">Хочешь стать программистом? <br> Это легче чем ты думаешь!</h1>
                <p class="wow fadeInLeft" data-wow-duration="2s">С Codium ты выучишь основные языки программирования и использование полезных инструментов. Осваивая знания на практике, окончишь курс менее, чем за 3 месяца</p>
                <a href="{{ url('register/') }}" class="btn wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">Начать обучение</a>
            </div>
            <img src="{{ asset('img/home/developer.png') }}" alt="developer, hero image, codium" class="wow fadeIn"
                data-wow-duration="2.5s">
            <div class="clearfix"></div>
            <div class="bottom"></div>
        </div>
        <a href="#nav-link" class="to-top wow fadeInUp"><span class="pe-7s-angle-up"></span></a>
        <div class="section section-1" id="section-1">
            <div class="content">
                <p class="wow fadeInUp" data-wow-duration="2s">Хочешь узнать</p>
                <h1 class="wow fadeInUp" data-wow-duration="2s">Что такое Codium?</h1>
                <p class="wow fadeInUp" data-wow-duration="2s">Codium - это интерактивный онлайн курс, для обучения программированию. <br>Этот курс заключает в себе важные языки веб программирования. <br> Каждый язык делится на главы, главы на уроки, а уроки<br> делятся на упражнения... <a href="">Читать...</a></p>
                <div class="thumb wow fadeInUp" data-wow-duration="2.3s">
                    <img src="{{ asset('img/home/html5.svg') }}" alt="">
                </div>
                <div class="thumb wow fadeInUp" data-wow-duration="2.6s">
                    <img src="{{ asset('img/home/css3.svg') }}" alt="">
                </div>
                <div class="thumb wow fadeInUp" data-wow-duration="2.9s">
                    <img src="{{ asset('img/home/javascript.svg') }}" alt="">
                </div>
                <div class="thumb wow fadeInUp" data-wow-duration="3.2s">
                    <img src="{{ asset('img/home/php.svg') }}" alt="">
                </div>
                <div class="thumb wow fadeInUp" data-wow-duration="3.5s">
                    <img src="{{ asset('img/home/jquery.svg') }}" alt="">
                </div>
            </div>
            <img src="{{ asset('img/home/border-1.png') }}" class="gradient gradient-1 wow fadeInLeft"
                data-wow-duration="2s" alt="">
            <img src="{{ asset('img/home/border-2.png') }}" class="gradient gradient-2 wow fadeInRight"
                data-wow-duration="2s" alt="">
        </div>
        <div class="section section-2">
            <div class="top"></div>
            <img src="{{ asset('img/home/s3.png') }}" class="wow fadeInUp" data-wow-duration="2s" alt="">
            <div class="content">
                <h1 class="wow fadeInUp" data-wow-duration="2s">Cloud-based обучение. <br> Результаты и статистики...
                </h1>
                <p class="wow fadeInUp" data-wow-duration="2s">Мы будем вести статистику вашего обучения. Будут подарки,
                    достижения и т. д. Мы не дадим вам остановиться на полпути</p>
                <a href="{{ url('register/') }}" class="btn wow fadeInRight" data-wow-duration="2.5s">Начать
                    обучение</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="section section-3">
            <div class="top"></div>
            <div class="big-circle wow fadeInLeft" data-wow-duration="2s"><img
                    src="{{ asset('img/home/man-interactive.png') }}" class="wow fadeInLeft" data-wow-delay="0.5s"
                    data-wow-duration="2s" alt=""></div>
            <div class="content">
                <h1 class="wow fadeInRight" data-wow-duration="2s">Интерактивное обучение?<br> Однозначно...</h1>
                <p class="wow fadeInRight" data-wow-duration="1.5s">Codium - это интерактивное обучение. Кто не знает
                    что это, жми сюда! Испробуешь всю мощь интерактивности...</p>
                <a href="{{ url('register/') }}" class="btn wow fadeInRight" data-wow-duration="2.5s">Начать
                    обучение</a>
            </div>
            <div class="bottom"></div>
        </div>
        <div class="section section-4">
            <div class="content">
                <h1 class="wow fadeInLeft" data-wow-duration="2s">Team-working вперёд!</h1>
                <p class="wow fadeInLeft" data-wow-duration="2.5s">Командная работа - то, что нужно для эффективного
                    обучения. Общайтесь, находите друзей и участвуйте на соревнованиях</p>
                <a href="{{ url('register/') }}" class="btn wow fadeInLeft" data-wow-duration="1.5s">Перейти на
                    форум</a>
            </div>
            <img src="{{ asset('img/home/artboard.png') }}" class="wow fadeIn" data-wow-duration="2s" alt="">
        </div>
        <div class="section section-5">
            <img src="{{ asset('img/home/border-3.png') }}" class="border-3 wow fadeInLeft" data-wow-duration="2s"
                alt="">
            <div class="big-circle wow fadeInRight" data-wow-duration="2s"></div>
            <h1 class="wow fadeInUp" data-wow-duration="2.5s">Видео от создателя этого курса</h1>
            <div class="play-icon wow fadeIn" data-wow-duration="2s"><img src="{{ asset('img/home/play.svg') }}" alt="">
            </div>
            <video id="video" class="wow fadeIn" data-wow-duration="2s" data-wow-delay="1s"
                src="{{ asset('video/Codium - Презентация.mp4') }}"></video>
        </div>
        <div class="section-6">
            <div class="center">
                <h1 class="wow fadeInUp" data-wow-duration="2s">Присоединяйтесь к сообществу!</h1>
                <p class="wow fadeInUp" data-wow-duration="2.5s">Будет очень интересно</p>
                <a href="{{ url('register/') }}" class="btn wow fadeInUp" data-wow-duration="3s">Регистрация</a>
            </div>
            <div class="footer wow fadeInUp" data-wow-duration="4s">© 2017-2019 Copyright Codium</div>
        </div>
@stop

@section('scripts')
    <script src="{{ asset('js/dist/prognroll.min.js') }}"></script>
    <script src="{{ asset('js/dist/home-script-dist.js') }}"></script>
@stop
