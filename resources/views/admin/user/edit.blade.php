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
    <div class="container-fluid">
        @include('includes.errors')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Пользователь @isset($user) ( {{$user->name}}) @endisset</h3>
                        <p>* - поля обязательные для заполнения</p>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                              @if(isset($user))
                              action="{{ route('admin.user.update', ['user' => $user->id]) }}"
                              @else
                              action="{{ route('admin.user.store') }}"
                              @endif
                              class="form-group form-valide"  enctype="multipart/form-data">

                            {{ csrf_field() }}
                            @if(isset($user))
                                {{ method_field('put') }}
                                <input type="hidden" name="url" value="{{ url()->previous() }}">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            @endif

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>

                                            <div class="form-group mb-2">
                                                <label>Имя</label>
                                                <input type="text" name="name" class="form-control"
                                                       @isset($user)
                                                       value="{{ old('name') ? old('name') : $user->name }}"
                                                       @else
                                                       value="{{old('name')}}"
                                                    @endisset
                                                >
                                            </div>
                                        </div>
                                            <div class="form-group mb-2">
                                                <label>E-mail</label>
                                                <input type="text" name="email" class="form-control"
                                                       @isset($user)
                                                       value="{{ old('email') ? old('email') : $user->email }}"
                                                       @else
                                                       value="{{ old('email') }}"
                                                        @endisset
                                                >
                                            </div>

                                            <div class="form-group mb-2">

                                                <label>Пароль</label>

                                                @isset($user)

                                                    <input type="hidden" name="user_password" class="form-control" value="{{$user->password}}">

                                                @endif

                                                    <input type="text" name="password" class="form-control">

                                            </div>

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
