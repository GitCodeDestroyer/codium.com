@extends('layouts.admin')

@section('admin-content')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    <h1>Данные курсов</h1>
    @empty($courses)
        <p>Курсы в БД не найдены</p>
    @else
        <table>
            <tbody>
            <tr style="background: #DFDFDF;">
                <th>Название</th>
                <th>Короткое назв.</th>
                <th>Длительность</th>
                <th>Сложность</th>
                <th>Необходимость</th>
                <th>Тип курса</th>
                <th>Описание</th>
            </tr>
            {{-- Creating table rows with courses data. '$courses' - are passed from adminController --}}
            @foreach ($courses as $course)
                <tr class="row" data-id="{{ count($courses) }}">
                    <th>{{ $course->title }}</th>
                    <th>{{ $course->name }}</th>
                    <th>{{ $course->time }}</th>
                    <th>@switch($course->difficulty)
                            @case(1)
                                Легко
                                @break
                            @case(2)
                                Среднее
                                @break
                            @case(3)
                                Сложно
                                @break
                            @case(4)
                                Очень Сложно
                                @break
                        @endswitch</th>
                    <th>@switch($course->necessity)
                            @case(1)
                                Первостепенное
                                @break
                            @case(2)
                                Не объязательное
                                @break
                            @case(3)
                                Желательное
                                @break
                        @endswitch</th>
                    <th>@switch($course->type)
                            @case(1)
                                Язык программирования
                                @break
                            @case(2)
                                Язык верстки
                                @break
                            @case(3)
                                Язык стилей
                                @break
                            @case(4)
                                Плагин
                                @break
                            @case(5)
                                Инструмент
                                @break
                            @case(6)
                                Другое
                                @break
                        @endswitch</th>
                    <th>{{ $course->about }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endempty
    <div id="new">
        <h1>Новый курс</h1>
        <form method="POST" action="{{ route('admin_store_new_course') }}">
            @csrf
            <div class="flex">
                <div class="group">
                    <input type="text" id="title" name="title" placeholder="Название">
                    @error('title')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="group">
                    <input type="text" id="name" name="name" placeholder="Короткое назв.">
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="group">
                    <input type="time" id="time" name="time" placeholder="Длительность">
                    @error('time')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="group">
                    <select name="difficulty" id="difficulty">
                        <option value="1">Легко</option>
                        <option value="2">Среднее</option>
                        <option value="3">Сложно</option>
                        <option value="4">Очень Сложно</option>
                    </select>
                    @error('difficulty')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="group">
                    <select name="type" id="type">
                        <option value="1">Язык программирования</option>
                        <option value="2">Язык верстки</option>
                        <option value="3">Язык стилей</option>
                        <option value="4">Плагин</option>
                        <option value="5">Инструмент</option>
                        <option value="6">Другое</option>
                    </select>
                    @error('type')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="group">
                    <select name="necessity" id="necessity">
                        <option value="1">Первостепенное</option>
                        <option value="2">Не объязательное</option>
                        <option value="3">Желательное</option>
                    </select>
                    @error('necessity')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="group">
                <textarea type="text" id="about" name="about" placeholder="Короткое опис."></textarea>
                @error('about')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button type="submit">Добавить</button>
            <div class="clearfix"></div>
        </form>
    </div>
@stop
