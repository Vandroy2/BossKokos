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
                    <h4>Настройки</h4>
                    <div class="row page-titles mx-0">
                        <a href="{{ route('admin.setting.create') }}">
                            <button type="button" class="btn btn-primary">
                                <span class="btn-icon-left text-primary">
                                    <i class="fa fa-plus color-primary"></i>
                                </span>
                                <span style="font-weight: bold">Добавить настройку</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Настройки</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Настройки</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Поле</th>
                                    <th scope="col">Значение</th>
                                    <th scope="col">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($entries as $setting)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $setting->field }}</td>
                                        <td>{{ $setting->value }}</td>
                                        <td><span><a href="{{ route('admin.setting.edit',$setting->field) }}" class="mr-4 btn btn-info" data-toggle="tooltip"
                                                     data-placement="top" title="Edit"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                <form action="{{ route('admin.setting.destroy',$setting->field) }}" method="POST" style="display:inline-block">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger"><i class="fa fa-close color-danger"></i></button>
                                                </form>
                                            </span>
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
