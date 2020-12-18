@extends('layouts.app')

@section('title', __('courses.dashboard'))

@section('styles')
    <style>@keyframes opacity {
               0% {
                   opacity: 1
               }
               50% {
                   opacity: 0
               }
               100% {
                   opacity: 1
               }
           }

        .nav .menu a:nth-of-type(1) {
            border-bottom: 2px solid #E9908A
        }</style>
    <link rel="stylesheet" href="{{ asset('css/dist/courses-style-dist.css') }}">
@stop

{{-- Important! Without this section nav is not renders! --}}
@section('nav-type', 'default')

@section('content')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    {{-- If there '$recent' is available, render started courses --}}
    @isset($recent_course)
        <h1 class="header">Мои курсы</h1>
        <div class="clearfix"></div>
        <div class="my-course" id="{{ $recent_course->name }}">
            <div class="decor">
                <img class="wow fadeIn" data-wow-duration="2.5s"
                     src="{{ asset('img/icons/'.$recent_course->name.'-plain-white.svg') }}" alt="">
                <div class="line">
                    <div class="progress wow slideInDown" data-wow-duration="2s" style="height: {{ $percent }}%"></div>
                </div>
                @php if (isset($percent) && $percent < 12) {$margin = 0;} else {$margin = 2.5 * $percent - 45;} @endphp
                <div class="type fadeInDown" data-wow-duration="2.5s"
                     style="margin-top: {{ $margin.'px' }}"> {{ $percent }}%
                </div>
            </div>
            <div class="info">
                <h2 class="wow fadeInUp" data-wow-duration="2s">{{ $recent_course->title }}</h2>
                <p class="wow fadeInUp" data-wow-duration="2.5s">{{ $recent_course->about }}</p>
                <a href="{{ url('courses/'.$recent_course->name) }}"
                   class="btn block-btn wow fadeInUp">@lang('courses.continue')</a>
            </div>
            <div class="clearfix"></div>
        </div>
        {{-- Rendering other courses --}}
        @isset($courses)
            @foreach ($courses as $course)
                @php $state = $course->name; @endphp
                {{-- Check, if this '$course' is started AND not equal to '$recent' course --}}
                @if (Auth::user()->$state != NULL && $state != $recent)
                    <div class="other-courses">
                        <div class="decor">
                            <img class="wow fadeIn" data-wow-duration="2.5s"
                                 src="{{ asset('img/icons/'.$state.'-plain-black.svg') }}" alt="">
                        </div>
                        <div class="info">
                            <h2 class="wow fadeInUp" data-wow-duration="2s">{{ $course->title }}</h2>
                            <div class="type wow fadeInRight" data-wow-duration="2s"
                                 style="padding-right: calc({{ $percent }}% - 30px)">
                                {{ $percent }}%
                            </div>
                            <div class="line">
                                <div class="progress wow slideInRight" data-wow-duration="2.5s"
                                     style="width: {{ $percent }}%"></div>
                            </div>
                            <a href="{{ url('courses/'.$state) }}"
                               class="btn block-btn wow fadeInUp">@lang('courses.continue')</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endif
            @endforeach
        @endisset
        {{-- else, drop message - there are no courses started --}}
    @else
        <div class="no-courses">
            <h1>@lang('courses.noCourse')</h1>
            <a href="{{ url('/courses') }}" class="btn red-btn">@lang('courses.choose')</a>
        </div>
    @endisset
    <div class="clearfix"></div>
@stop

@section('sidebar')
    <div class="sidebar">
        <h1>@lang('courses.news')</h1>
        <div class="block" style="background: url({{ asset('img/news1.jpg') }}) no-repeat center/cover">
            <h2>Давно пора!</h2>
            <p>Турнир 2020 года скоро начнется</p>
            <a href="" class="btn">Читать</a>
        </div>
        <div class="block" style="background: url({{ asset('img/news3.jpg') }}) no-repeat center/cover">
            <h2>JavaScript: Jquery - я твой отец!</h2>
            <p>Новый курс по Jquery на разработке...</p>
            <a href="" class="btn">Читать</a>
        </div>
        <p class="subs">Будьте в курсе событий <a href="">Подписаться</a></p>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/dist/course-script-dist.js') }}"></script>
    <script>
        // Chartist.Pie('#chartPreferences', {
        //     labels: ["33%", "54%", "13%"],
        //     series: [33, 54, 13]
        // });
        Array.func = function(arg2) {
                return arg2;
            }

        let array = []


        console.log(array.func(2));
        // . ... same result
    </script>
@stop
