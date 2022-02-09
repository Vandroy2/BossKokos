@extends('layouts.admin')
@section('style')
    <link href="{{ asset('adminAssets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Услуги</h4>
                    <div class="row page-titles mx-0">
                        <a href="{{ route('admin.news.create') }}">
                            <button type="button" class="btn btn-primary">
                                <span class="btn-icon-left text-primary">
                                    <i class="fa fa-plus color-primary"></i>
                                </span>
                                <span style="font-weight: bold">Добавить Услугу</span>
                            </button>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Записи</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Услуги</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Услуги</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Название</th>
                                    <th>Превью</th>
                                    <th>Ссылка</th>
                                    <th>Email для отправки</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($news as $oneNews)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('admin.news.edit',$oneNews->id) }}">{{ $oneNews->title }}</a></td>
{{--                                        <td><img class="mr-3 img-fluid tableImg" src="{{ asset('storage/newss/'.$oneNews->image) }}" alt="Quixkit"></td>--}}
                                        <td>{{ $oneNews->content}}</td>
                                        <td>
                                            <a href="{{ route('admin.news.edit',$oneNews->id) }}" class="mr-4 btn btn-info" data-toggle="tooltip"
                                               data-placement="top" title="Edit"><i
                                                        class="fa fa-pencil color-muted"></i> </a>
                                            <form action="{{ route('admin.news.destroy',$oneNews->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('adminAssets/vendor/toastr/js/toastr.min.js') }}"></script>
    @if(session()->has('alert-success'))
        <script>
            toastr.success("{{ session('alert-success') }}", {
                timeOut: 5000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })

        </script>
    @endif
    <script src="{{ asset('adminAssets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/plugins-init/datatables.init.js') }}"></script>
@endsection
