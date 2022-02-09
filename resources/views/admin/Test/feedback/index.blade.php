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
                    <h4>Заявки на услуги</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Заявки на услуги</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Заявки на услуги</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table verticle-middle table-responsive-sm">
                                        <thead>
                                        <tr>
                                            <th class="col-2">Дата</th>
                                            <th class="col-2">Имя</th>
                                            <th class="col-2">Номер телефона</th>
                                            <th class="col-1">Город</th>
                                            <th class="col-3">Услуга</th>
                                            <!--<th class="col-1">Рейтинг</th>-->
                                            <th class="col-1">Статус</th>
                                            <th scope="col col-1">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($entries as $feedback)
                                            <tr>
                                                <td>
                                                    {{ $feedback->created_at}}
                                                </td>
                                                <td>
                                                    {{$feedback->name}}
                                                </td>
                                                <td>
                                                    {{$feedback->phone }}
                                                </td>
                                                <td>
                                                    @if($feedback->city->name )
                                                        {{ $feedback->city->name }}
                                                    @else
                                                        Нет
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$feedback->service->title}}
                                                </td>
                                                <td>
                                                    @if($feedback->status == 0)
                                                        <span class="badge badge-warning" data-id="{{$feedback->id}}" data-url="{{ route('admin.changeStatusFeedback') }}" style="cursor:pointer">Не обработано</span>
                                                    @else
                                                        <span class="badge badge-success" data-id="{{$feedback->id}}" data-url="{{ route('admin.changeStatusFeedback') }}" style="cursor:pointer">Обработано</span>
                                                    @endif

                                                </td>
                                                <td><span>
                                                    <form action="{{ route('admin.feedback.destroy',$feedback->id) }}" method="POST" style="display:inline-block">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger"><i class="fa fa-close color-danger"></i></button>
                                                </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                {{ $entries->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('adminAssets/vendor/toastr/js/toastr.min.js') }}"></script>
    <script>
        $('.badge').on('click', function () {
            var elem  = $(this);
            var id  = $(this).data("id");
            var _url = $(this).data("url");
            console.log(_url);
            $.ajax({
                url: _url,
                data: {'id':id},
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response) {
                        console.log(response['status']);
                        if(response['status'] == 0)
                        {
                            $(elem).removeClass('badge-success').addClass('badge-warning').text('Не обработано');
                            toastr.success("Статус изменен!", {
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
                        }
                        else
                        {
                            $(elem).removeClass('badge-warning').addClass('badge-success').text('Обработано');
                            toastr.success("Статус изменен!", {
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
                        }
                    }
                }
            });
        });
    </script>
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
