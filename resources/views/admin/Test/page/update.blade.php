@extends('layouts.admin')

@section('style')

    <!-- Summernote -->
    <link href="{{ asset('adminAssets/vendor/summernote/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Seo @isset($entry) ( {{$entry->slug}} ) @endisset</h3>
                        <p>* - поля обязательные для заполнения</p>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                              @if(isset($entry))
                              action="{{ route('admin.pages.update', ['page' => $entry->id]) }}"
                              @else
                              action="{{ route('admin.pages.store') }}"
                              @endif
                              class="form-group form-valide"  enctype="multipart/form-data">

                            {{ csrf_field() }}
                            @if(isset($entry))
                                {{ method_field('put') }}
                                <input type="hidden" name="url" value="{{ url()->previous() }}">
                            @endif
                            <div class="form-group">
                                <label>Алиас Страницы *</label>
                                <input type="text" name="slug" class="form-control"
                                       @isset($entry)
                                       value="{{ old('slug') ? old('slug') : $entry->slug }}"
                                       @else
                                       value="{{ old('slug') }}"
                                        @endisset
                                >
                                @if($errors->has('slug'))
                                    <div class="error text-danger small">{{ $errors->first('slug') }}</div>
                                @endif
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link @if($errors->has('title.uk') or $errors->has('description.uk')) text-danger @endif active" id="uk-tab" data-toggle="tab" href="#uk" role="tab" aria-controls="uk" aria-selected="false">украинский <img src="/images/ua.svg" alt="" style="width: 1.5em;"></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link @if($errors->has('title.ru') or $errors->has('description.ru')) text-danger @endif" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="false">русский <img src="/images/ru.svg" alt="" style="width: 1.5em;"></a>
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>

                                            <div class="form-group">
                                                <label>Заголовок Страницы <small>(украинский вариант)</small> *</label>
                                                <input type="text" name="title[uk]" class="form-control"
                                                       @isset($entry)
                                                       value="{{ old('title_uk') ? old('title_uk') : $entry->translations['title']['uk'] }}"
                                                       @else
                                                       value="{{ old('title_uk') }}"
                                                        @endisset
                                                >
                                                @if($errors->has('title.uk'))
                                                    <div class="error text-danger small">{{ $errors->first('title.uk') }}</div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>Описание Страницы *</label>
                                                <textarea name="description[uk]" class="form-control summernote" id="description_uk" rows="5">
                                                @isset($entry) {{ old('description_uk') ? old('description_uk') : $entry->translations['description']['uk'] }} @else {{ old('description_uk') }} @endisset
                                            </textarea>
                                                @if($errors->has('description.uk'))
                                                    <div class="error text-danger small">{{ $errors->first('description.uk') }}</div>
                                                @endif
                                            </div>
                                            @isset($entry)
                                                @include('admin.Test.includes.seo_tags_uk', array('page' => $entry ))
                                                @else
                                                    @include('admin.Test.includes.seo_tags_uk')
                                                    @endisset
                                        </div>
                                        <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="ru-tab"><br>

                                            <div class="form-group">
                                                <label>Заголовок Страницы <small>(русский вариант)</small> *</label>
                                                <input type="text" name="title[ru]" class="form-control"
                                                       @isset($entry)
                                                       value="{{ old('title_ru') ? old('title_ru') : $entry->translations['title']['ru'] }}" @else value="{{ old('title_ru') }}" @endisset
                                                >
                                                @if($errors->has('title.ru'))
                                                    <div class="error text-danger small">{{ $errors->first('title.ru') }}</div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>Описание Страницы *</label>
                                                <textarea name="description[ru]" class="form-control summernote" id="description" rows="5">
                                                @isset($entry) {{ old('description_ru') ? old('description_ru') : $entry->translations['description']['ru'] }} @else {{ old('description_ru') }}@endisset
                                            </textarea>
                                                @if($errors->has('description.ru'))
                                                    <div class="error text-danger small">{{ $errors->first('description.ru') }}</div>
                                                @endif
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

    <!-- Summernote -->
    <script src="{{ asset('adminAssets/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('adminAssets/js/plugins-init/summernote-init.js') }}"></script>
@endsection
