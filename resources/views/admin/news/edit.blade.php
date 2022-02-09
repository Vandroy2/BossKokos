@extends('layouts.admin')

@section('style')


    <link href="{{ asset('adminAssets/vendor/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAssets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/pickadate/themes/default.date.css') }}">
@endsection



@section('content')

    <div class="container-fluid">
        @include('includes.errors')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST"
                              @if(isset($news))
                              action="{{ route('admin.news.update', ['news' => $news->id]) }}"
                              @else
                              action="{{ route('admin.news.store') }}"
                              @endif
                              class="form-group form-valide mb-2"  enctype="multipart/form-data">

                            {{ csrf_field() }}
                            @if(isset($news))
                                {{ method_field('put') }}
                                <input type="hidden" name="url" value="{{ url()->previous() }}">
                                <input type="hidden" name="news_id" value="{{ $news->id }}">

                            @endif
                            <div class="row">
                                <div class="col-sm-8">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#ru" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Русская версия</button>
                                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#ua" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> Українська версiя</button>
                                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">English version</button>
                                        </div>
                                    </nav>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab"><br>
                                            <div class="form-group mb-2">
                                                <label>Заголовок новости</label>
                                                <input type="text" name="title_ru" class="form-control"
                                                       @isset($news)
                                                       value="{!!old('title_ru') ? old('title_ru') : $news->title_ru !!}"
                                                       @else
                                                       value="{{ old('title_ru') }}"
                                                    @endisset
                                                >
                                            </div>

                                            <div class="form-group mb-2">
                                                <label>Содержание новсти</label>
                                                <textarea name="content_ru" class="form-control editTextarea" id="" rows="5">
                                                    @isset($news)
                                                        {!!old('content_ru') ? old('content_ru') : $news->content_ru !!}
                                                    @else
                                                        {!! old('content_ru') !!}
                                                    @endisset
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ua" role="tabpanel" aria-labelledby="uk-tab"><br>

                                            <div class="form-group mb-2">
                                                <label>Заголовок новини<small>(український варiант)</small></label>
                                                <input type="text" name="title_ua" class="form-control"
                                                       @isset($news)
                                                       value="{!!old('title_ua') ? old('title_ua') : $news->title_ua !!}"
                                                       @else
                                                       value="{{ old('title_ua') }}"
                                                    @endisset
                                                >
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Змст новини<small>(український варiант)</small></label>
                                                <textarea name="content_ua" class="form-control editTextarea" id="" rows="5">
                                                    @isset($news)
                                                        {!!old('content_ua') ? old('content_ua') : $news->content_ua !!}
                                                    @else
                                                        {!!old('content_ua') !!}
                                                    @endisset
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en" role="tabpanel" aria-labelledby="en-tab"><br>

                                            <div class="form-group mb-2">
                                                <label>News Title<small>(english)</small></label>
                                                <input type="text" name="title_en" class="form-control"
                                                       @isset($news)
                                                       value="{!! old('title_en') ? old('title_en') : $news->title_en !!}"
                                                       @else
                                                       value="{{ old('title_en') }}"
                                                    @endisset
                                                >
                                            </div>

                                            <div class="form-group mb-2">
                                                <label>News content<small>(english)</small></label>
                                                <textarea name="content_en" class="form-control editTextarea" id="" rows="5">
                                                    @isset($news)
                                                        {!! old('content_en') ? old('content_en') : $news->content_en !!}
                                                    @else
                                                        {!!old('content_en') !!}
                                                    @endisset
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')



<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>

    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>


    <!-- the main fileinput plugin script JS file -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>

    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script>

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/ru.js"></script>
    <!-- momment js is must -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ru.min.js" integrity="sha512-+yvkALwyeQtsLyR3mImw8ie79H9GcXkknm/babRovVSTe04osQxiohc1ukHkBCIKQ9y97TAf2+17MxkIimZOdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('adminAssets/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminAssets/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Material color picker -->
    <script src="{{ asset('adminAssets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('adminAssets/js/plugins-init/summernote-init.js') }}"></script>
    <!-- Material color picker init -->
    <script src="{{ asset('adminAssets/js/plugins-init/material-date-picker-init.js') }}"></script>

    <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>

    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>

{{--    <script src="{{asset('js/wysiwyg.js')}}"></script>--}}


    <script>
        tinymce.init({
            selector: '.editTextarea',
        });
    </script>

@endsection
