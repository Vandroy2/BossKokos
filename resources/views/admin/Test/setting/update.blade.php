@extends('layouts.admin')

@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Настройка @if(isset($entry)) ( {{$entry->field}} ) @else | Создание @endif</h3>
                        <p>* - поля обязательные для заполнения</p>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                              @if(isset($entry))
                              action="{{ route('admin.setting.update', ['setting' => $entry->id]) }}"
                              @else
                              action="{{ route('admin.setting.store') }}"
                              @endif
                              class="form-group form-valide"  enctype="multipart/form-data">

                            {{ csrf_field() }}
                            @if(isset($entry))
                                {{ method_field('put') }}
                                <input type="hidden" name="url" value="{{ url()->previous() }}">
                            @endif

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group row col-sm-6">
                                        <label>Поле *</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="field" class="form-control"
                                                   @isset($entry)
                                                   value="{{ old('field') ? old('field') : $entry->field }}"
                                                   @else
                                                   value="{{ old('field') }}"
                                                    @endisset
                                            >
                                            @if($errors->has('field'))
                                                <div class="error text-danger small">{{ $errors->first('field') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row col-sm-6">
                                        <label>Значение *</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="value" class="form-control"
                                                   @isset($entry)
                                                   value="{{ old('value') ? old('value') : $entry->value }}"
                                                   @else
                                                   value="{{ old('value') }}"
                                                    @endisset
                                            >
                                            @if($errors->has('value'))
                                                <div class="error text-danger small">{{ $errors->first('value') }}</div>
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
