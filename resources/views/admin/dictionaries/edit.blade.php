@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/vendor/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAssets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/pickadate/themes/default.date.css') }}">
@endsection



@section('content')
    <h2 class="content-heading">Словари</h2>
    @include('includes.errors')
    <div class="row">
        <div class="col-sm-12">
            <div class="block">
                <form method="post" id="form-language-lines" action="{{ route('admin.dictionaries.update') }}">
                    @method('PUT')
                    @csrf
                    <div class="block-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @forelse($translations as $group => $line)
                                            <a class="nav-item nav-link @if($loop->first) active @endif" id="{{ $group }}-link" data-toggle="tab" href="#{{ $group }}" role="tab" aria-controls="{{ $group }}" aria-selected="true">{{ $group }}</a>
                                        @empty
                                        @endforelse
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">

                                    @forelse($translations as $group => $langLines)
                                        <div class="tab-pane fade show @if($loop->first) active @endif" id="{{ $group }}" role="tabpanel" aria-labelledby="{{ $group }}-link">
                                            <br>

                                            @forelse($langLines as $line)
                                                <div class="row">

                                                    @component('includes.dictionary_input', [
                                                        'name' => $group.'['.$line->key.'][ru]',
                                                        'label' => $line->key. ' (русский вариант)',
                                                        'placeholder' => 'Введите meta description',
                                                        'object' => $line,
                                                        'rows' => 3,
                                                        'lang' => 'ru',
                                                        'width' => 'col-sm-4'
                                                    ])@endcomponent
                                                    @component('includes.dictionary_input', [
                                                        'name' => $group.'['.$line->key.'][uk]',
                                                        'label' => $line->key. ' (україський варiант)',
                                                        'placeholder' => 'Введите meta description',
                                                        'object' => $line,
                                                        'rows' => 3,
                                                        'lang' => 'uk',
                                                        'width' => 'col-sm-4'
                                                    ])@endcomponent


                                                    @component('includes.dictionary_input', [
                                                      'name' => $group.'['.$line->key.'][en]',
                                                      'label' => $line->key. ' (english version)',
                                                      'placeholder' => 'Введите meta description',
                                                      'object' => $line,
                                                      'rows' => 3,
                                                      'lang' => 'en',
                                                      'width' => 'col-sm-4'
                                                  ])@endcomponent

                                                </div>

                                            @empty
                                            @endforelse

                                        </div>
                                    @empty
                                        <h5>Еще не создано ни одной языковой переменной</h5>
                                    @endforelse

                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


@section('js_after')

    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script>
        $(document).ready(function () {

            window.onkeydown = function (e) {
                if (e.keyCode === 13) {
                    e.preventDefault()
                }
            }

        });

    </script>

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

@endsection
