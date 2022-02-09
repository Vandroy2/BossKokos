@extends('layouts.admin')

@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-money text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Всего заявок</div>
{{--                            <div class="stat-digit">{{ $ordersCount }}</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Пользователей</div>
{{--                            <div class="stat-digit">{{ $usersCount }}</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-layout-grid2 text-pink border-pink"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Отзывов</div>
{{--                            <div class="stat-digit">{{ $reviewsCount }}</div>--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Статистика заявок</h4>
                    </div>
                    <div class="card-body">
                        <div id="morris-bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Последние заявки</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Пользователь</th>
                                    <th>Номер телефона</th>
                                    <th>Дата</th>
                                    <th>Сдаёт</th>
                                    <th>Получает</th>
                                    <th>Курс покупки</th>
                                    <th>Курс продажи</th>
                                    <th>Опт</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach ($orders as $order)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            {{ $order->fio }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $order->phone }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $order->created_at }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $order->price_buy }} {{ $order->currency_sale }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $order->price_sale }} {{ $order->currency_buy }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $order->rate_sale }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $order->rate_buy }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($order->isOpt == 1) да  @else нет @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if(!$order->status)--}}
{{--                                                <span class="badge badge-warning" data-id="{{$order->id}}" data-url="{{ route('admin.changeStatusOrder') }}" style="cursor:pointer">Не обработано</span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge badge-success" data-id="{{$order->id}}" data-url="{{ route('admin.changeStatusOrder') }}" style="cursor:pointer">Обработано</span>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td><span><form action="{{ route('admin.order.destroy',$order->id) }}" method="POST" style="display:inline-block">--}}

{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}

{{--                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger"><i class="fa fa-close color-danger"></i></button>--}}
{{--                                                </form></span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
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


    <!-- Vectormap -->
    <script src="{{ asset('adminAssets/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('adminAssets/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('adminAssets/vendor/circle-progress/circle-progress.min.js') }}"></script>





    <script src="{{ asset('adminAssets/js/dashboard/dashboard-1.js') }}"></script>
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
    <script>
        {{--var arrayFromPHP = {!! json_encode($ordersCountLastTenDays) !!};--}}
        var lastArray = [];
        var jsonObj = new Object();
        $.each(arrayFromPHP, function (index, value) {
            lastArray.push({y:index,a:value});
        });
        Morris.Bar({
            element: 'morris-bar-chart',
            data: lastArray,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Заявок'],
            barColors: ['#5873FE', '#5873FE'],
            hideHover: 'auto',
            gridLineColor: '#5873FE',
            resize: true
        });
    </script>
@endsection
