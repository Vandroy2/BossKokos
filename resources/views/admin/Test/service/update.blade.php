@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

    <!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
    <!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->

    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
    <!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
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
                    <h3>Услуга @isset($entry) ( {{$entry->title}} ) @endisset</h3>
                    <p>* - поля обязательные для заполнения</p>
                </div>
                <div class="card-body">
                    <form method="POST"
                          @if(isset($entry))
                          action="{{ route('admin.service.update', ['service' => $entry->id]) }}"
                          @else
                          action="{{ route('admin.service.store') }}"
                          @endif
                          class="form-group form-valide"  enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @if(isset($entry))
                            {{ method_field('put') }}
                            <input type="hidden" name="url" value="{{ url()->previous() }}">
                        @endif

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if($errors->has('title.uk') or $errors->has('description.uk')) text-danger @endif active" id="uk-tab" data-toggle="tab" href="#uk" role="tab" aria-controls="uk" aria-selected="false">украинский <img src="/images/ua.svg" alt="" style="width: 1.5em;"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($errors->has('title.ru') or $errors->has('description.ru')) text-danger @endif" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="false">русский <img src="/images/ru.svg" alt="" style="width: 1.5em;"></a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>

                                        <div class="form-group">
                                            <label>Заголовок услуги <small>(украинский вариант)</small></label>
                                            <input type="text" name="title[uk]" class="form-control"
                                                   @isset($entry)
                                                   value="{{ old('title[uk]') ? old('title[uk]') : $entry->translations['title']['uk'] }}"
                                                   @else
                                                   value="{{ old('title[uk]') }}"
                                                    @endisset
                                            >
                                            @if($errors->has('title.uk'))
                                                <div class="error text-danger small">{{ $errors->first('title.uk') }}</div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="ru-tab"><br>

                                        <div class="form-group">
                                            <label>Заголовок услуги <small>(русский вариант)</small></label>
                                            <input type="text" name="title[ru]" class="form-control"
                                                   @isset($entry)
                                                   value="{{ old('title[ru]') ? old('title[ru]') : $entry->translations['title']['ru'] }}" @else value="{{ old('title_ru') }}" @endisset
                                            >
                                            @if($errors->has('title.ru'))
                                                <div class="error text-danger small">{{ $errors->first('title.ru') }}</div>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <br>

                                <div class="form-group">
                                    <label for="">Ссылка на ресурс</label>
                                    <input type="text" name="link"  class="form-control" value="@isset($entry) {{ $entry->link }} @endisset">
                                    @if($errors->has('link'))
                                        <div class="error text-danger small">{{ $errors->first('link') }}</div>
                                    @endif
                                    <small class="red">не заполнять если не уверены</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Емейл для отправки</label>
                                    <input name="email" id="email" type="text" class="form-control" value="@isset($entry) {{ $entry->email }} @endisset"/>
                                    @if($errors->has('email'))
                                        <div class="error text-danger small">{{ $errors->first('email') }}</div>
                                    @endif
                                    <small class="red">укажите почту для отправки заявок по этой услуге</small>
                                </div>
                                <div class="form-group">
                                    <h5>Титульное изображение *</h5>
                                    <span><small>будет отображаться на странице новости (1200 px по ширине)</small></span>
                                    <input type="file" name="image" id="input-images" @isset($entry) data-img="{!! asset('storage/services/'.$entry->image) !!}" @endisset class="form-control">
                                    @if($errors->has('image'))
                                        <div class="error text-danger small">{{ $errors->first('image') }}</div>
                                    @endif
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
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>

    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>


    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>

    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script -->

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
@endsection