@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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
                <div class="card col-12">
                    <div class="card-header">
                        <h3>Отделение @isset($entry) ( {{$entry->name}} ) @endisset</h3>
                        <p>* - поля обязательные для заполнения</p>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              @if(isset($entry))
                              action="{{ route('admin.address.update', ['address' => $entry->id]) }}"
                              @else
                              action="{{ route('admin.address.store') }}"
                              @endif
                              class="form-group form-valide"  enctype="multipart/form-data">

                            {{ csrf_field() }}
                            @if(isset($entry))
                                {{ method_field('put') }}
                                <input type="hidden" name="url" value="{{ url()->previous() }}">
                            @endif
                <div class="row">
                    <div class="col-sm-8">
                            <div class="form-row d-flex justify-content-between">

                                <div class="form-group col-md-6">
                                    <label for="">Город *</label>
                                    <select name="city_id" id="city" class="form-control" data-placeholder="Выберите город">
                                        <option value="0">Выберите город</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}" @if(isset($entry) && $city->id == $entry->city_id) selected  @endif>{{$city->name}}</option>

                                        @endforeach
                                    </select>
                                    @if($errors->has('city_id'))
                                        <div class="error text-danger small">{{ $errors->first('city_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row d-flex justify-content-between">
                                <div class="form-group col-md-6">
                                    <label>Адрес (RU) *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><img src="/images/ru.svg" alt="" style="width: 1.5em;"></span>
                                        </div>
                                        <input type="text" name="name[ru]" class="form-control"
                                               @isset($entry)
                                               value="{{ old('name[ru]') ? old('name[ru]') : $entry->translations['name']['ru'] }}"
                                               @else
                                               value="{{ old('name[ru]') }}"
                                                @endisset
                                        >

                                    </div>
                                    @if($errors->has('name.ru'))
                                        <div class="error text-danger small">{{ $errors->first('name.ru') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Адрес (UA) *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><img src="/images/ua.svg" alt="" style="width: 1.5em;"></span>
                                        </div>
                                        <input type="text" name="name[uk]" class="form-control"
                                               @isset($entry)
                                               value="{{ old('name[uk]') ? old('name[uk]') : $entry->translations['name']['uk'] }}"
                                               @else
                                               value="{{ old('name[uk]') }}"
                                                @endisset
                                        >

                                    </div>
                                    @if($errors->has('name.uk'))
                                        <div class="error text-danger small">{{ $errors->first('name.uk') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div id="map" style="height:400px; width:100%"></div>
                            <input id="pac-input" class="controls input" type="text" placeholder="Поиск адреса">
                            <hr>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Состояние</label>
                            <select name="published" id="" class="form-control">
                                <option value="1" @if(isset($entry->published) && $entry->published == 1 ) {{ 'selected' }} @endif >
                                    Активен
                                </option>
                                <option value="0" @if(isset($entry->published) && $entry->published == 0) {{ 'selected' }} @endif >
                                    Не активен
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Телефон *</label>
                            <input type="tel" name="phones" class="form-control"
                                   {{--value="{{ isset($office) ? $office->phone : old('phone') }}">--}}
                                   @isset($entry)
                                   value="{{ old('phones') ? old('phones') : $entry->phones }}"
                                   @else
                                   value="{{ old('phones') }}"
                                   @endisset
                            >
                            @if($errors->has('phones'))
                                <div class="error text-danger small">{{ $errors->first('phones') }}</div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label>График работы</label>
                            <div>
                                <label for="twenty-four">Круглосуточно</label>
                                <input id="twenty-four" type="checkbox" name="round_the_clock"
                                       @if(old('round_the_clock'))
                                       checked
                                       @elseif(isset($entry) and $entry->round_the_clock == 1)
                                       checked
                                        @endif
                                >
                            </div>
                            <div id="worktime" class="d-flex align-items-center"
                                 @if(old('round_the_clock'))
                                 style="visibility: hidden;"
                                 @elseif(isset($entry) and $entry->round_the_clock == 1)
                                 style="visibility: hidden;"
                                    @endif
                            >
                                <input type="text" name="time_work" class="form-control"
                                       @isset($entry)
                                       value="{{ old('time_work') ? old('time_work') : $entry->time_work }}"
                                       @else
                                       value="{{ old('time_work') }}"
                                        @endisset
                                >
                            </div>
                        </div>
                            <input type="hidden" id="lng" name="lng" value="{{ isset($entry) ? $entry->lng : old('lng') }}"/>
                            <input type="hidden" id="lat" name="lat" value="{{ isset($entry) ? $entry->lat : old('lat') }}"/>

                            <br>

                    </div>
                </div>
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


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg8cnSkO9AXRrLpbSFb-79xrZ4sPVqw0g&libraries=places&language=ru-RU&region=UA"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="{{ asset('adminAssets/js/offices.js') }}"></script>
@endsection