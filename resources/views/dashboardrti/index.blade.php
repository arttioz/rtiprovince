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

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 label-search">
                            <label class="col-xs-12 col-sm-12" for="daterange">ตั้งแต่</label>
                            <input type="text" class="form-control" name="start" id="startDate" autocomplete="off" value="{{$startdate}}"/>
                        </div>
                        <div class="col-xs-12 col-sm-4 label-search">
                            <label class="col-xs-12 col-sm-12" for="daterange">ถึง</label>
                            <input type="text" class="form-control" name="end" id="endDate" autocomplete="off" value="{{$enddate}}"/>
                        </div>

                        <div class="col-xs-12 col-sm-4 label-search">
                            <label class="col-xs-12 col-sm-6" for="daterange">จังหวัดที่เสียชีวิต</label>
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
                    </div>

                    <div class="row" style="margin-top: 15px !important;">
                        <button id="search-btn" class="btn btn-primary col-xs-12 col-sm-3 pull-right" type="submit">
                            แสดงผล
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>

                <div class="sbox-content" style="margin: 0 auto;">
                    <div class="sbox-title">
                        <div style="text-align: center; padding-top: 5px">
                            <p style="font-size: 20px">จำนวนและอัตราการตายจากอุบัติเหตุทางถนน จ. {{$province}}</p>
                        </div>
                        {{-- Table --}}
                        <div class="table-responsive flex-row-center">
                            <table class="table table-striped table-bordered table-hover">
                                <thead style="background-color: #FFE495">
                                <tr>
                                    <th scope="col">ปี พ.ศ.</th>
                                    <th scope="col">จำนวน(คน)</th>
                                    <th scope="col">ต่อประชากรแสนคน</th>
                                    <th scope="col">ต่อเดือน</th>
                                    <th scope="col">ต่อวัน</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">2562</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="sbox-title">
                        <div style="text-align: center; padding-top: 5px">
                            <p style="font-size: 20px">จำนวนการตายจากอุบัติเหตุทางถนน จำแนกรายเดือนและตามแหล่งที่มา จ. {{$province}}</p>
                        </div>
                        <div class="table-responsive flex-row-center">
                            <table class="table table-striped table-bordered table-hover">
                                <thead style="background-color: #b9def0">
                                <tr>
                                    <th scope="col">แหล่งที่มา</th>
                                    @foreach($months as $key => $month)
                                        <th scope="col">{{$key}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="sbox-title">
                        <div style="text-align: center; padding-top: 5px">
                            <p style="font-size: 20px">สถานการณ์ เดือน{{$monthly}}</p>
                        </div>
                        <div class="table-responsive flex-row-center">
                            <table class="table table-striped table-bordered table-hover">
                                <thead style="background-color: #FFBBBB">
                                <tr>
                                    <th scope="col">สถิติ</th>
                                    <th scope="col">เดือนนี้</th>
                                    <th scope="col">จำนวนสะสม(คน)</th>
                                    <th scope="col">อัตราสะสม(ต่อ ปชก.แสนคน)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                    <div class="table-responsive flex-row-center">
                        <table class="table table-striped table-bordered table-hover" style="width: 800px">
                            <thead style="background-color: #d7ffcf">
                            <tr>
                                <th scope="col">#</th>
                                @foreach($months as $key => $month)
                                    <th scope="col">{{$month}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
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

        .flex {
            display: flex;
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

            var url = '{{url("exportdata")}}?start='+start+"&end="+end+"&province_id="+province_id;

            window.open(url);
        });

        $('#startDate').datepicker({
            language: "th",
            orientation: "auto left",
            autoclose: true,
            todayHighlight: true,
            minViewMode: 1,
            format: "yyyy-mm-dd"
        });

        $('#endDate').datepicker({
            language: "th",
            orientation: "auto left",
            autoclose: true,
            todayHighlight: true,
            minViewMode: 1,
            format: "yyyy-mm-dd"
        });

        Highcharts.chart('annual-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'อัตราตายจากอุบัติเหตุทางถนน ปี พ.ศ.'
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
                pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
            },
            series: [{
                name: 'Population',
                colorByPoint: true,
                data: [
                    ['Shanghai', 24.2],
                    ['Beijing', 20.8],
                    ['Karachi', 14.9],
                    ['Shenzhen', 13.7],
                    ['Guangzhou', 13.1],
                    ['Istanbul', 12.7],
                    ['Mumbai', 12.4],
                    ['Moscow', 12.2],
                    ['São Paulo', 12.0],
                    ['Delhi', 11.7],
                    ['Kinshasa', 11.5],
                    ['Tianjin', 11.2],
                    ['Lahore', 11.1],
                    ['Jakarta', 10.6],
                    ['Dongguan', 10.6],
                    ['Lagos', 10.6],
                    ['Bengaluru', 10.3],
                    ['Seoul', 9.8],
                    ['Foshan', 9.3],
                    ['Tokyo', 9.3]
                ],

            }]
        });

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

        Highcharts.chart('monthly-chart', {

            chart: {
                scrollablePlotArea: {
                    minWidth: 700
                }
            },

            data: {
                csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
                beforeParse: function (csv) {
                    return csv.replace(/\n\n/g, '\n');
                }
            },

            title: {
                text: 'จำนวนตายจากอุบัติเหตุทางถนนจำแนกรายเดือน ปี พ.ศ. และ '
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

            series: [{
                name: 'All sessions',
                lineWidth: 4,
                marker: {
                    radius: 4
                }
            }, {
                name: 'New users'
            }]
        });

    </script>
@stop
