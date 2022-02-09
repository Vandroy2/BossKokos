@extends('layouts.admin')
@section('style')
    <link href="{{ asset('adminAssets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- row -->

    <div class="text-right w-100 text-end">

        <button type="button" class="btn btn-primary">
                                <span class="btn-icon-left text-primary">
                                    <i class="fa fa-plus color-primary"></i>
                                </span>
            <a href="/" class = "main_admin_link"><span style="font-weight: bold">Перейти на главную страницу сайта</span></a>
        </button>

    </div>
    <div class="container-fluid text-center">
        <div class="row page-titles mx-0">
            <div class="w-100 p-md-0">
                <div class="welcome-text">
                    <h4>Добро пожаловать {{\Illuminate\Support\Facades\Auth::user()->name}}</h4>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                </div>
            </div>
        </div>
    </div>

{{-------------------------------------------------------------AmCart-------------------------------------------------}}


    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <script>
        am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX"
            }));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "month",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "month",
                tooltip: am5.Tooltip.new(root, {
                    labelText:"{valueY}"
                })
            }));

            series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
            series.columns.template.adapters.add("fill", (fill, target) => {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", (stroke, target) => {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });


// Set data
            var data = [{
                month: "Январь",
                value: 2025
            }, {
                month: "Февраль",
                value: 1882
            }, {
                month: "Март",
                value: 1809
            }, {
                month: "Апрель",
                value: 1322
            }, {
                month: "Май",
                value: 1122
            }, {
                month: "Июнь",
                value: 1114
            }, {
                month: "Июль",
                value: 984
            }, {
                month: "Август",
                value: 711
            }, {
                month: "Сентябрь",
                value: 665
            }, {
                month: "Октябрь",
                value: 580
            }, {
                month: "Ноябрь",
                value: 443
            }, {
                month: "Декабрь",
                value: 441
            }];

            xAxis.data.setAll(data);
            series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>

    <!-- HTML -->
    <div id="chartdiv"></div>

{{--------------------------------------------------Earth Amchart-----------------------------------------------------}}


{{--    <style>--}}
{{--        #chartdiv {--}}
{{--            width: 100%;--}}
{{--            height: 500px;--}}
{{--            max-width: 100%;--}}
{{--        }--}}
{{--    </style>--}}

{{--    <!-- Resources -->--}}
{{--    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>--}}
{{--    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>--}}
{{--    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>--}}
{{--    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>--}}

{{--    <!-- Chart code -->--}}
{{--    <script>--}}
{{--        am5.ready(function() {--}}

{{--// Create root element--}}
{{--// https://www.amcharts.com/docs/v5/getting-started/#Root_element--}}
{{--            var root = am5.Root.new("chartdiv");--}}


{{--// Set themes--}}
{{--// https://www.amcharts.com/docs/v5/concepts/themes/--}}
{{--            root.setThemes([--}}
{{--                am5themes_Animated.new(root)--}}
{{--            ]);--}}


{{--// Create the map chart--}}
{{--// https://www.amcharts.com/docs/v5/charts/map-chart/--}}
{{--            var chart = root.container.children.push(am5map.MapChart.new(root, {--}}
{{--                panX: "rotateX",--}}
{{--                panY: "rotateY",--}}
{{--                projection: am5map.geoOrthographic(),--}}
{{--                paddingBottom: 20,--}}
{{--                paddingTop: 20,--}}
{{--                paddingLeft: 20,--}}
{{--                paddingRight: 20--}}
{{--            }));--}}


{{--// Create main polygon series for countries--}}
{{--// https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/--}}
{{--            var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {--}}
{{--                geoJSON: am5geodata_worldLow--}}
{{--            }));--}}

{{--            polygonSeries.mapPolygons.template.setAll({--}}
{{--                tooltipText: "{name}",--}}
{{--                toggleKey: "active",--}}
{{--                interactive: true--}}
{{--            });--}}

{{--            polygonSeries.mapPolygons.template.states.create("hover", {--}}
{{--                fill: root.interfaceColors.get("primaryButtonHover")--}}
{{--            });--}}

{{--            polygonSeries.mapPolygons.template.states.create("active", {--}}
{{--                fill: root.interfaceColors.get("primaryButtonHover")--}}
{{--            });--}}


{{--// Create series for background fill--}}
{{--// https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon--}}
{{--            var backgroundSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {}));--}}
{{--            backgroundSeries.mapPolygons.template.setAll({--}}
{{--                fill: root.interfaceColors.get("alternativeBackground"),--}}
{{--                fillOpacity: 0.1,--}}
{{--                strokeOpacity: 0--}}
{{--            });--}}
{{--            backgroundSeries.data.push({--}}
{{--                geometry: am5map.getGeoRectangle(90, 180, -90, -180)--}}
{{--            });--}}


{{--// Set up events--}}
{{--            var previousPolygon;--}}

{{--            polygonSeries.mapPolygons.template.on("active", function (active, target) {--}}
{{--                if (previousPolygon && previousPolygon != target) {--}}
{{--                    previousPolygon.set("active", false);--}}
{{--                }--}}
{{--                if (target.get("active")) {--}}
{{--                    var centroid = target.geoCentroid();--}}
{{--                    if (centroid) {--}}
{{--                        chart.animate({ key: "rotationX", to: -centroid.longitude, duration: 1500, easing: am5.ease.inOut(am5.ease.cubic) });--}}
{{--                        chart.animate({ key: "rotationY", to: -centroid.latitude, duration: 1500, easing: am5.ease.inOut(am5.ease.cubic) });--}}
{{--                    }--}}
{{--                }--}}

{{--                previousPolygon = target;--}}
{{--            });--}}


{{--// Make stuff animate on load--}}
{{--            chart.appear(1000, 100);--}}

{{--        }); // end am5.ready()--}}
{{--    </script>--}}

{{--    <!-- HTML -->--}}
{{--    <div id="chartdiv"></div>--}}
@endsection




