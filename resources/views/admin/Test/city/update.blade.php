@extends('layouts.admin')

@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Город @if(isset($entry)) ( {{$entry->name}} ) @else | Создание @endif</h3>
                        <p>* - поля обязательные для заполнения</p>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                              @if(isset($entry))
                              action="{{ route('admin.city.update', ['city' => $entry->id]) }}"
                              @else
                              action="{{ route('admin.city.store') }}"
                              @endif
                              class="form-group form-valide"  enctype="multipart/form-data">

                            {{ csrf_field() }}
                            @if(isset($entry))
                                {{ method_field('put') }}
                                <input type="hidden" name="url" value="{{ url()->previous() }}">
                            @endif

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group row">
                                        <label>Город <small>(украинский вариант)</small> *</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><img src="/images/ua.svg" alt="" style="width: 1.5em;"></span>
                                            </div>
                                            <input type="text" name="name[uk]" class="form-control"
                                                   @isset($entry->translations['name']['uk'])
                                                   value="{{ old('name[uk]') ? old('name[uk]') : $entry->translations['name']['uk'] }}"
                                                   @else
                                                   value="{{ old('name[uk]') }}"
                                                    @endisset
                                            >
                                            @if($errors->has('name.uk'))
                                                <div class="error text-danger small">{{ $errors->first('name.uk') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label>Город <small>(русский вариант)</small> *</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><img src="/images/ru.svg" alt="" style="width: 1.5em;"></span>
                                            </div>
                                            <input type="text" name="name[ru]" class="form-control"
                                                   @isset($entry->translations['name']['ru'])
                                                   value="{{ old('name[ru]') ? old('name[ru]') : $entry->translations['name']['ru'] }}"
                                                   @else
                                                   value="{{ old('name[ru]') }}"
                                                    @endisset
                                            >
                                            @if($errors->has('name.ru'))
                                                <div class="error text-danger small">{{ $errors->first('name.ru') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label>URL телеграм канала</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="telegram" class="form-control"
                                                   @isset($entry->telegram)
                                                   value="{{ old('telegram') ? old('telegram') : $entry->telegram }}"
                                                   @else
                                                   value="{{ old('telegram') }}"
                                                    @endisset
                                            >
                                            @if($errors->has('domain'))
                                                <div class="error text-danger small">{{ $errors->first('domain') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label>URL домена *</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="domain" class="form-control"
                                                   @isset($entry->domain)
                                                   value="{{ old('domain') ? old('domain') : $entry->domain }}"
                                                   @else
                                                   value="{{ old('domain') }}"
                                                    @endisset
                                            >
                                            @if($errors->has('domain'))
                                                <div class="error text-danger small">{{ $errors->first('domain') }}</div>
                                            @endif
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

    <!-- Jquery Validation -->
    <script src="{{ asset('adminAssets/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Form validate init -->
    <script src="{{ asset('adminAssets/js/plugins-init/jquery.validate-init.js') }}"></script>
@endsection
