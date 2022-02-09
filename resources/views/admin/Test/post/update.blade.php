@extends('layouts.admin')

@section('style')
    <!-- Summernote -->
    <link href="{{ asset('adminAssets/vendor/summernote/summernote.css') }}" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{ asset('adminAssets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/pickadate/themes/default.date.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Услуга @isset($entry) ( {{$entry->title_uk}} ) @endisset</h3>
                    <p>* - поля обязательные для заполнения</p>
                </div>
                <div class="card-body">
                    <form method="POST"
                          @if(isset($entry))
                          action="{{ route('admin.post.update', ['post' => $entry->id]) }}"
                          @else
                          action="{{ route('admin.post.store') }}"
                          @endif
                          class="form-group form-valide"  enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @if(isset($entry))
                            {{ method_field('put') }}
                            <input type="hidden" name="url" value="{{ url()->previous() }}">
                        @endif

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="uk-tab" data-toggle="tab" href="#uk" role="tab" aria-controls="uk" aria-selected="false">украинский <img src="/images/ua.svg" alt="" style="width: 1.5em;"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="false">русский <img src="/images/ru.svg" alt="" style="width: 1.5em;"></a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>

                                        <div class="form-group">
                                            <label>Заголовок услуги <small>(украинский вариант)</small></label>
                                            <input type="text" name="title_uk" class="form-control"
                                                   @isset($entry)
                                                    value="{{ old('title_uk') ? old('title_uk') : $entry->title_uk }}"
                                                   @else
                                                    value="{{ old('title_uk') }}"
                                                    @endisset
                                            >
                                        </div>

                                        <div class="form-group">
                                            <label>Описание услуги</label>
                                            <textarea name="description_uk" class="form-control summernote" id="description_uk" rows="5">
                                                @isset($entry)
                                                    {{ old('description_uk') ? old('description_uk') : $entry->description_uk }}
                                                @else
                                                    {{ old('description_uk') }}
                                                @endisset
                                            </textarea>

                                        </div>

                                        @isset($entry)
                                            @include('admin.Test.includes.seo_tags_uk', array('page' => $entry ))
                                        @else
                                            @include('admin.Test.includes.seo_tags_uk')
                                        @endisset

                                    </div>
                                    <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="ru-tab"><br>

                                        <div class="form-group">
                                            <label>Заголовок услуги <small>(русский вариант)</small></label>
                                            <input type="text" name="title_ru" class="form-control"
                                                   @isset($entry)
                                                   value="{{ old('title_ru') ? old('title_ru') : $entry->title_ru }}"
                                                   @else
                                                   value="{{ old('title_ru') }}"
                                                    @endisset
                                            >
                                        </div>

                                        <div class="form-group">
                                            <label>Описание услуги</label>
                                            <textarea name="description_ru" class="form-control summernote" id="description" rows="5">
                                                @isset($entry)
                                                    {{ old('description_ru') ? old('description_ru') : $entry->description_ru }}
                                                    @else
                                                        {{ old('description_ru') }}
                                                        @endisset
                                            </textarea>

                                        </div>

                                        @isset($entry)
                                            @include('admin.Test.includes.seo_tags_ru', array('page' => $entry ))
                                            @else
                                                @include('admin.Test.includes.seo_tags_ru')
                                                @endisset

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <br>
                                <div class="form-group">
                                    <label for="">Состояние</label>
                                    <select name="published" id="" class="form-control">
                                        <option value="1" @if(isset($entry) &&  $entry->published ) {{ 'selected' }} @endif >
                                            Опубликовано
                                        </option>
                                        <option value="0" @if(isset($entry) &&  !$entry->published ) {{ 'selected' }} @endif >
                                            Не опубликовано
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Алиас</label>
                                    <input type="text" name="slug"  class="form-control" value="@isset($entry) {{ $entry->slug }} @endisset">
                                    <small class="red">не заполнять если не уверены</small>
                                </div>
                                <div class="form-group">
                                    <h5>Дата</h5>
                                    <span><small>выберите дату</small></span>
                                    <input name="date" type="text" placeholder="2017-06-04" id="date-format" class="datepicker form-control" value="2021-10-11"/>
                                </div>
                                <div class="form-group">
                                    <h5>Титульное изображение *</h5>
                                    <span><small>будет отображаться на странице новости (1200 px по ширине)</small></span>
                                    <input type="file" name="image" class="form-control" @if(!isset($entry)) required @endif>
                                </div>
                                <div class="form-group">
                                    @isset($entry->image)
                                        <div class="card card-body bg-light col-sm-4">
                                            <img src="{{ asset('storage/images/news/'.$entry->image) }}" alt=""   class="img-fluid">
                                        </div>
                                    @endisset
                                </div>


                            </div>
                        </div>

                        <br>
                        <div class="form-group">
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
@endsection
