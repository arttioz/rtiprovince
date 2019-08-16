@extends('layouts.app')
@section('content')
    <section class="page-header row">
        <h1> {{ $pageTitle }}
            <small> {{ $pageNote }} </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"> {{ $pageTitle }} </li>
        </ol>
    </section>

    <div class="page-content row">
        <div class="page-content-wrapper no-margin">

            <div class="sbox">
                <div class="sbox-title">
                    {!! Form::open(array('url'=>'dashboardrti', 'class'=>'','parsley-validate'=>'','novalidate'=>' ','id'=>'search-form', 'method'=>'get' )) !!}

                    <div class="flex-row-center flex-xs-column-start">
                        <label class="flex w-auto" for="startDate">ตั้งแต่</label>
                        <div class="flex col-xs-12 col-sm-3 label-search">
                            <input type="text" class="form-control" name="start" id="startDate" autocomplete="off"
                                   value="{{$startdate}}"/>
                        </div>
                        {{--                        <div class="col-xs-12 col-sm-4 label-search">--}}
                        {{--                            <label class="col-xs-12 col-sm-12" for="endDate">ถึง</label>--}}
                        {{--                            <input type="text" class="form-control" name="end" id="endDate" autocomplete="off" value="{{$enddate}}"/>--}}
                        {{--                        </div>--}}

                        <label class="flex w-auto" for="daterange">จังหวัดที่เสียชีวิต</label>
                        <div class="flex col-xs-12 col-sm-3 label-search">
                            <select name="province_id" id="province_id" class="form-control" required>
                                <option value="" disabled selected>กรุณาเลือก</option>
                                @foreach($locations as $location)

                                    <option @if($province_id == $location->LOC_CODE) selected @endif
                                    value="{{$location->LOC_CODE}}">
                                        {{$location->LOC_PROVINCE}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex col-xs-12 col-sm-3">
                            <button id="search-btn" class="btn btn-primary btn-block" type="submit">
                                แสดงผล
                            </button>
                        </div>
                    </div>

                    {{--                    <div class="row" style="margin-top: 15px !important;">--}}
                    {{--                        <button id="search-btn" class="btn btn-primary col-xs-12 col-sm-3 " type="submit">--}}
                    {{--                            แสดงผล--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}

                    {!! Form::close() !!}
                </div>

                <div class="sbox-content" style="margin: 0 auto;">
                    <div class="sbox-title">
                        <div style="text-align: center; padding-top: 5px">
                            <p style="font-size: 20px">จำนวนและอัตราการตายจากอุบัติเหตุทางถนน จ. {{$province}}</p>
                        </div>
                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover tb-chart-details">
                                <thead style="background-color: #FFE495">
                                <tr>
                                    <th scope="col" style="text-align: center">ปี พ.ศ.</th>
                                    <th scope="col" style="text-align: center">จำนวน(คน)</th>
                                    <th scope="col" style="text-align: center">ต่อประชากรแสนคน</th>
                                    <th scope="col" style="text-align: center">ต่อเดือน</th>
                                    <th scope="col" style="text-align: center">ต่อวัน</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($deathRate as $info)
                                    @if ($info)
                                        <tr>
                                            <td scope="row" style="text-align: center">{{$info['year']}}</td>
                                            <td style="text-align: right">{{$info['total']}}</td>
                                            <td style="text-align: right">{{$info['per100K']}}</td>
                                            <td style="text-align: right">{{$info['perMonth']}}</td>
                                            <td style="text-align: right">{{$info['perDay']}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="sbox-title">
                        <div style="text-align: center; padding-top: 5px">
                            <p style="font-size: 20px">จำนวนการตายจากอุบัติเหตุทางถนน จำแนกรายเดือนและตามแหล่งที่มา
                                จ. {{$province}}</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover tb-chart-details">
                                <thead style="background-color: #b9def0">
                                <tr>
                                    <th scope="col" style="text-align: center">แหล่งที่มา</th>
                                    @foreach($months as $key => $month)
                                        <th scope="col" style="text-align: center">{{$key}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($monthlyDeathRate as $info)
                                    @if ($info)
                                        <tr>
                                            <td scope="row" style="text-align: center">{{$info['source']}}</td>
                                            @foreach ($months as $key => $month)
                                                @isset($info['data'][$key])
                                                    <td style="text-align: right">{{$info['data'][$key]}}</td>
                                                @else
                                                    <td style="text-align: right">-</td>
                                                @endisset
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--                    <div class="sbox-title">--}}
                    {{--                        <div style="text-align: center; padding-top: 5px">--}}
                    {{--                            <p style="font-size: 20px">สถานการณ์ เดือน{{$monthly}}</p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="table-responsive flex-row-center">--}}
                    {{--                            <table class="table table-striped table-bordered table-hover">--}}
                    {{--                                <thead style="background-color: #FFBBBB">--}}
                    {{--                                <tr>--}}
                    {{--                                    <th scope="col">สถิติ</th>--}}
                    {{--                                    <th scope="col">เดือนนี้</th>--}}
                    {{--                                    <th scope="col">จำนวนสะสม(คน)</th>--}}
                    {{--                                    <th scope="col">อัตราสะสม(ต่อ ปชก.แสนคน)</th>--}}
                    {{--                                </tr>--}}
                    {{--                                </thead>--}}
                    {{--                                <tbody>--}}
                    {{--                                <tr>--}}
                    {{--                                    <td scope="row">1</td>--}}
                    {{--                                    <td>Mark</td>--}}
                    {{--                                    <td>Otto</td>--}}
                    {{--                                    <td>@mdo</td>--}}
                    {{--                                </tr>--}}
                    {{--                                </tbody>--}}
                    {{--                            </table>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
                {{-- Chart --}}
                <div class="sbox-title flex-row-center">
                    <div class="flex">
                        <div id="annual-chart" class="chart"></div>
                    </div>
                </div>

                <div class="sbox-title flex-row-center">
                    <div class="flex">
                        <div id="monthly-district-chart" class="chart"></div>
                    </div>
                </div>
                <div class="sbox-title">
                    <div class="flex-row-center">
                        <div class="flex">
                            <div id="monthly-chart" class="chart"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover tb-chart-details">
                            <thead style="background-color: #d7ffcf">
                            <tr>
                                <th scope="col">#</th>
                                @foreach($months as $key => $month)
                                    <th scope="col">{{$month}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($compareAnnual as $info)
                                @if ($info)
                                    <tr>
                                        <td scope="row" style="text-align: center">{{$info['year']}}</td>
                                        @foreach ($months as $key => $month)
                                            @isset($info['data'][$key])
                                                <td style="text-align: right">{{$info['data'][$key]}}</td>
                                            @else
                                                <td style="text-align: right">-</td>
                                            @endisset
                                        @endforeach
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <style>
        .label-search {
            font-size: 14px;
        }

        .chart {
            min-width: 310px;
            width: 800px;
            height: 400px;
            margin: 0 auto;
        }

        .flex-row-center {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .tb-chart-details{
            width: 800px;
            margin: 0 auto;
        }

        @media (max-width: 767px) {
            .flex-xs-column-start {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .flex {
            display: flex;
            padding: 10px 15px;
        }

        .w-auto {
            width: auto;
        }

        table.table-bordered {
            border: 1px solid rgba(156, 164, 169, 0.52);
            margin-top: 20px;
        }

        table.table-bordered > thead > tr > th {
            border: 1px solid rgba(156, 164, 169, 0.52);
        }

        table.table-bordered > tbody > tr > td {
            border: 1px solid rgba(156, 164, 169, 0.52);
        }
    </style>

    <script>
        $('#export-btn').click(function () {

            var start = $("#startDate").val();
            var end = $("#endDate").val();
            var province_id = $("#province_id").val();

            var url = '{{url("exportdata")}}?start=' + start + "&end=" + end + "&province_id=" + province_id;

            window.open(url);
        });

        $('#startDate').datepicker({
            language: "th",
            orientation: "auto left",
            autoclose: true,
            todayHighlight: true,
            minViewMode: 1,
            format: "yyyy-mm"
        });

        $('#endDate').datepicker({
            language: "th",
            orientation: "auto left",
            autoclose: true,
            todayHighlight: true,
            minViewMode: 1,
            format: "yyyy-mm-dd"
        });

        let annualDeath = [];
        @foreach($annualDeathRate as $key => $value)
        annualDeath.push([
            `{{$key}}`,
            {{$value}}
        ])
        @endforeach


        Highcharts.chart('annual-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: `อัตราตายจากอุบัติเหตุทางถนน ปี พ.ศ.{{$year}}`
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: null
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'จำนวน: <b>{point.y:.1f} คน</b>'
            },
            series: [{
                name: 'Population',
                colorByPoint: true,
                data: annualDeath,

            }]
        });


        let compareMonthly = [
                @foreach($compareMonthly as $key => $value)
            {
                name: `{{ $key }}`,
                data: [
                    @foreach($value as $data)
                    {{ $data }},
                    @endforeach
                ]
            },
            @endforeach
        ];

        Highcharts.chart('monthly-district-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'อัตราตายจากอุบัติเหตุทางถนน ประจำเดือน{{$monthly}} ปี พ.ศ. และ '
            },
            subtitle: {
                text: null
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: null
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Tokyo',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

            }, {
                name: 'New York',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

            }, {
                name: 'London',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

            }, {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

            }]
        });

        let compareAnnual = [
                @foreach($compareAnnual as $key => $value)
            {
                name: `{{ $value['year'] }}`,
                data: [
                    @foreach($value['data'] as $data)
                    {{ $data }},
                    @endforeach
                ]
            },
            @endforeach
        ];

        Highcharts.chart('monthly-chart', {

            chart: {
                scrollablePlotArea: {
                    minWidth: 700
                }
            },

            title: {
                text: `จำนวนตายจากอุบัติเหตุทางถนนจำแนกรายเดือน ปี พ.ศ. ${compareAnnual[0].name} และ ${compareAnnual[1].name}`
            },

            subtitle: {
                text: null
            },

            xAxis: {
                tickInterval: 7 * 24 * 3600 * 1000, // one week
                tickWidth: 0,
                gridLineWidth: 1,
                labels: {
                    align: 'left',
                    x: 3,
                    y: -3
                }
            },

            yAxis: [{ // left y axis
                title: {
                    text: 'จำนวน (คน)'
                },
                labels: {
                    align: 'left',
                    x: 3,
                    y: 16,
                    format: '{value:.,0f}'
                },
                showFirstLabel: false
            }, { // right y axis
                linkedTo: 0,
                gridLineWidth: 0,
                opposite: true,
                title: {
                    text: null
                },
                labels: {
                    align: 'right',
                    x: -3,
                    y: 16,
                    format: '{value:.,0f}'
                },
                showFirstLabel: false
            }],

            legend: {
                align: 'left',
                verticalAlign: 'top',
                borderWidth: 0
            },

            tooltip: {
                shared: true,
                crosshairs: true
            },

            plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function (e) {
                                hs.htmlExpand(null, {
                                    pageOrigin: {
                                        x: e.pageX || e.clientX,
                                        y: e.pageY || e.clientY
                                    },
                                    headingText: this.series.name,
                                    maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                        this.y + ' sessions',
                                    width: 200
                                });
                            }
                        }
                    },
                    marker: {
                        lineWidth: 1
                    }
                }
            },

            series: compareAnnual
        });

    </script>
@stop
