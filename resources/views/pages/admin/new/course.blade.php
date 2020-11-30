@extends('layouts.admin')

@section('admin-content')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    <a href="#new" style="right: 3%;margin-top: 85px;color:#3C3F50;position: absolute;"><span class="pe-7s-plus"></span>
        Новый курс</a>
    <h1>Данные курсов</h1>
    <table>
        <tbody>
        <tr style="background: #DFDFDF;">
            <th>Название</th>
            <th>Короткое назв.</th>
            <th>Длительность</th>
            <th>Сложность</th>
            <th>Необходимость</th>
            <th>Тип курса</th>
            <th>Короткое опис.</th>
            <th>Кол-во уроков</th>
            <th>Кол-во упражнений</th>
            <th>Силлабус</th>
        </tr>
        {{-- Creating table rows with courses data. '$courses' - are passed from adminController --}}
        @isset($courses)
            @foreach ($courses as $course)
                @php
                    // Creating arrays for changing values. The selected course have 'id', and this 'id' is key for this arrays
                    $titleArray[] = $course->title;
                    $nameArray[] = $course->name;
                    $timeArray[] = $course->time;
                    $difficArray[] = $course->diffic;
                    $neededArray[] = $course->needed;
                    $typeArray[] = $course->type;
                    $aboutArray[] = $course->about;
                    $aboutLongArray[] = $course->aboutLong;
                    $lessonsArray[] = $course->lessons;
                    $exercisesArray[] = $course->exercises;
                    $syllabusArray[] = $course->syllabus;
                @endphp
                <tr class="row" data-id="{{ count($nameArray) }}">
                    <th>{{ $course->title }}</th>
                    <th>{{ $course->name }}</th>
                    <th>{{ $course->time }}</th>
                    <th>{{ $course->diffic }}</th>
                    <th>{{ $course->needed }}</th>
                    <th>{{ $course->type }}</th>
                    <th>{{ $course->about }}</th>
                    <th>{{ $course->lessons }}</th>
                    <th>{{ $course->exercises }}</th>
                    <th>{{ $course->syllabus }}</th>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
    <div id="edit">
        <h1>Изменить курс {{ $errors }}</h1>
        <form method="POST" action="{{ url('admin/edit') }}">
            @csrf
            <label for="nameSelect">Выберите название</label><select name="NameSelect" id="nameSelect">
                {{-- Creating courses options for select element --}}
                @isset($nameArray)
                    @for ($i = 0; $i < count($nameArray); $i++)
                        <option id="opt-{{ $i }}" value="{{ $i }}">{{ $nameArray[$i] }}</option>
                    @endfor
                @endisset
            </select>
            <label for="title">Название</label><input type="text" id="title" name="title" placeholder="Название">
            <label for="name">Короткое назв.</label><input type="text" id="name" name="name"
                                                           placeholder="Короткое назв.">
            <label for="time">Длительность</label><input type="text" id="time" name="time" placeholder="Длительность">
            <label for="diffic">Сложность</label><input type="text" id="diffic" name="diffic" placeholder="Сложность">
            <label for="needed">Необходимость</label><input type="text" id="needed" name="needed"
                                                            placeholder="Необходимость">
            <label for="type">Тип курса</label><input type="text" id="type" name="type" placeholder="Тип курса">
            <label for="lessons">Кол-во уроков</label><input type="text" id="lessons" name="lessons"
                                                             placeholder="Кол-во уроков">
            <label for="exercises">Кол-во упражнений</label><input type="text" id="exercises" name="exercises"
                                                                   placeholder="Кол-во упражнений">
            <div class="clearfix"></div>
            <label for="about">Короткое опис.</label><textarea type="text" id="about" name="about"
                                                               placeholder="Короткое опис."></textarea>
            <label for="aboutLong">Описание</label><textarea type="text" id="aboutLong" name="aboutLong"
                                                             placeholder="Описание"></textarea>
            <label for="syllabus">Силлабус</label><textarea type="text" id="syllabus" name="syllabus"
                                                            placeholder="Силлабус"></textarea>
            <button type="submit">Изменить</button>
        </form>
    </div>
    <div id="new">
        <h1>Новый курс</h1>
        <form method="POST" action="{{ url('admin/new') }}">
            @csrf
            <input type="text" id="title" name="newTitle" placeholder="Название">
            <input type="text" id="name" name="newName" placeholder="Короткое назв.">
            <input type="text" id="time" name="newTime" placeholder="Длительность">
            <input type="text" id="diffic" name="newDiffic" placeholder="Сложность">
            <input type="text" id="needed" name="newNeeded" placeholder="Необходимость">
            <input type="text" id="type" name="newType" placeholder="Тип курса">
            <input type="text" id="lessons" name="newLessons" placeholder="Кол-во уроков">
            <input type="text" id="exercises" name="newExercises" placeholder="Кол-во упражнений">
            <div class="clearfix"></div>
            <textarea type="text" id="about" name="newAbout" placeholder="Короткое опис."></textarea>
            <textarea type="text" id="aboutLong" name="newAboutLong" placeholder="Описание"></textarea>
            <textarea type="text" id="syllabus" name="newSyllabus" placeholder="Силлабус"></textarea>
            <button type="submit">Добавить</button>
        </form>
    </div>
@stop
