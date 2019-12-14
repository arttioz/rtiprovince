@extends('layouts.app')
@section('content')
    <section class="page-header row">
        @if($user_level === '1')
        <div id="header-level1">
            <h1> {{ $pageTitle }} <h4> {{$userslevel_name}}: เขต {{$district_code}}</h4></h1>
            <ol class="breadcrumb">
                {{--<li><a href="#"><i class="fa fa-home"></i> Home</a></li>--}}
                {{--<li  class="active"> {{ $pageTitle }} </li>--}}
            </ol>
        </div>
        @endif
        @if($user_level === '2')
        <div id="header-level2">
            <h1> {{ $pageTitle }} <h4> {{$userslevel_name}}: {{$province_id}}</h4></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li  class="active"> {{ $pageTitle }} </li>
            </ol>
        </div>
        @endif

    </section>
    <div class="page-content row">
        <div class="page-content-wrapper no-margin">
            <div class="sbox">
                <div class="sbox-title">
                    {!! Form::open(array('url'=>'deathdata', 'class'=>'','parsley-validate'=>'','novalidate'=>' ','id'=>'search-form', 'method'=>'get' )) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 label-search">
                            <label class="col-xs-12 col-sm-12" for="daterange">ตั้งแต่</label>
                            <input type="text" class="form-control" name="start" id="startDate" autocomplete="off" value="{{$startdate}}"/>
                        </div>
                        <div class="col-xs-12 col-sm-2 label-search">
                            <label class="col-xs-12 col-sm-12" for="daterange">ถึง</label>
                            <input type="text" class="form-control" name="end" id="endDate" autocomplete="off" value="{{$enddate}}"/>
                        </div>
{{--                        <div class="col-xs-12 col-sm-3 label-search">--}}
{{--                            <label class="col-xs-12 col-sm-12" for="daterange">จังหวัดที่เสียชีวิต</label>--}}
{{--                            <select name="province_id" id="province_id" class="form-control" required>--}}
{{--                                <option value="" disabled selected>กรุณาเลือก</option>--}}
{{--                                @foreach($locations as $location)--}}

{{--                                    <option @if($province_id == $location->LOC_CODE) selected @endif--}}
{{--                                    value="{{$location->LOC_CODE}}">--}}
{{--                                        {{$location->LOC_PROVINCE}}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="col-xs-12 col-sm-2 label-search">
                            <label class="col-xs-12 col-sm-12" for="daterange">ชื่อ</label>
                            <input class="form-control"  type="text" name="Fname" value="{{$Fname}}" placeholder="กรอกชื่อให้ถูกต้อง">
                        </div>
                        <div class="col-xs-12 col-sm-2 label-search">
                            <label class="col-xs-12 col-sm-12" for="daterange">นามสกุล</label>
                            <input class="form-control"  type="text" name="Lname" value="{{$Lname}}" placeholder="กรอกนามสกุลให้ถูกต้อง">
                        </div>
                        <div class="col-xs-12 col-sm-4 label-search">
                            <label class="col-xs-12 col-sm-12" for="daterange">เลขที่บัตรประชาชน</label>
                            <input class="form-control"  type="text" name="citizen_id" value="{{$citizen_id}}" placeholder="เลขที่บัตรประชาชน 13 หลัก">
                        </div>

                    </div>
                    <div class="row" style="margin-top: 15px !important;">
                        <button id="search-btn" class="btn btn-primary col-xs-12 col-sm-3 pull-right" type="submit"> ค้นหา </button>
                    </div>

                    {!! Form::close() !!}
                </div>

                <div class="sbox-content">
                    <div class="row" @if($user_level === 1) style="display: none" @else style="margin: 10px" @endif>

                        <span class="col-xs-3 col-sm-3 col-md-2"> จำนวนข้อมูล: {{$deaths->total()}} </span>

                        <button id="export-btn"  style="margin-top: -10px" class="btn btn-secondary col-xs-4 col-sm-3 col-md-2" type="button">
                            Download ข้อมูล
                        </button>

{{--                        {!! Form::open(array('url'=>'importdata', 'id'=>'import-form', 'enctype' => 'multipart/form-data' )) !!}--}}
{{--                        <div class="col-xs-3 col-sm-3 col-md-2">--}}
{{--                            <input type="file" name="import_file" id="import_file"  />--}}
{{--                            <a href="{{url("template")}}"> ตัวอย่าง File นำเข้า </a>--}}
{{--                        </div>--}}
{{--                        <button  id="import-btn" style="margin-right: 10px; margin-top: -10px" class="btn btn-secondary col-xs-4 col-sm-3 col-md-2" type="submit"> Import ข้อมูล </button>--}}
{{--                        {!! Form::close() !!}--}}

{{--                        <a href="{{url("deadconso")."/create?province_id=".$province_id."&return=".urlencode( url()->full() )}}">--}}
{{--                            <button id="insert-btn"  style="margin-top: -10px" class="btn btn-secondary col-xs-4 col-sm-3 col-md-2" type="button">--}}
{{--                                เพิ่ม ข้อมูล--}}
{{--                            </button>--}}
{{--                        </a>--}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered "    >
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ไอดี</th>
                                <th scope="col">คำนำหน้าชื่อ</th>
                                <th scope="col">ชื่อจริง</th>
                                <th scope="col">นามสกุล</th>
                                <th scope="col">เลขที่บัตรประชาชน</th>
                                <th scope="col">อายุ</th>
                                <th scope="col">เพศ</th>
                                <th scope="col">วันเกิด</th>
                                <th scope="col">วันที่เสียชีวิต</th>
                                <th scope="col">ICD10</th>
                                <th scope="col">พาหนะ</th>
                                <th scope="col">ตำบลที่เกิดเหตุ</th>
                                <th scope="col">อำเภอที่เกิดเหตุ</th>
                                <th scope="col">จังหวัดที่เกิดเหตุ</th>
                                <th scope="col">จังหวัดที่ตาย</th>
                                <th scope="col">Lat,Long</th>
                                <th scope="col" >แหล่งที่มา</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deaths  as $death)
                                    <td scope="col">
                                        @if($user_level === '2')
                                            <a href="{{url("deadconso")."/".$death->id."/edit?province_id=".$province_id."&return=". urlencode( url()->full() ) }}" style="color: #0e0e0e">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <i data="{{$death->id}}" class="fa fa-trash delete-button" aria-hidden="true"></i>
                                            <a href="{{url("deadconsohistory")."?id=".$death->id}}" style="color: #0e0e0e">
                                                <i class="fa fa-history" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                            <a href="{{url("viewdeadconso")."/".$death->id}}" style="color: #0e0e0e">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                    </td>

                                    <td scope="col">{{$death->id}}</td>
                                    <td scope="col">{{$death->Prefix}}</td>
                                    <td scope="col">{{$death->Fname}}</td>
                                    <td scope="col">{{$death->Lname}}</td>
                                    <td scope="col">{{$death->DrvSocNO}}</td>
                                    <td scope="col">{{$death->Age}}</td>
                                    <td scope="col">{{$death->Gender}}</td>
                                    <td scope="col">{{ (new \Carbon\Carbon($death->BirthDate))->format("Y-m-d")}}</td>
                                    <td scope="col">{{ (new \Carbon\Carbon($death->DeadDate))->format("Y-m-d") }}</td>
                                    <td scope="col">{{$death->NCAUSE}}</td>
                                    <td scope="col">{{$death->Vehicle}}</td>
                                    <td scope="col">{{$death->AccSubDist}}</td>
                                    <td scope="col">{{$death->AccDist}}</td>
                                    <td scope="col">{{$death->AccProv}}</td>
                                    <td scope="col">{{$death->DeathProv}}</td>
                                    <td scope="col">{{$death->Latlong}}</td>
                                    <td scope="col" style="font-size: 10px">{{$death->Source}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>



                    {{ $deaths->appends(Request::except('page'))->links() }}
                    {{--<div id="pageselect"></div>--}}

                </div>
            </div>
        </div>
    </div>
    <style>
        .label-search{
            font-size: 14px;
        }

    </style>

    <script>
        $(document).ready(function(){
            var user_level_id = '{{$user_level}}';
            console.log(user_level_id)
            if (user_level_id === 1) {
                document.getElementById("header-level2").style.display = "none";
            } else if(user_level_id === 2) {
                document.getElementById("header-level1").style.display = "none";
            } else {
                console.log('Error')
            }

        });

        $('#export-btn').click(function () {

            var start = $("#startDate").val();
            var end = $("#endDate").val();
            var province_id = $("#province_id").val();

            var url = '{{url("exportdata")}}?start='+start+"&end="+end+"&province_id="+province_id;

//            alert(url);
            window.open(url);
        });

        $(function() {

            {{--$("#pageselect").pagination({--}}
                {{--items:{{$deaths->lastPage()}},--}}
                {{--itemsOnPage: 10,--}}
                {{--cssStyle: 'light-theme'--}}
            {{--});--}}

            var returnURL = '{{urlencode( url()->full() )}}';
            var url = '{{url("deletedata")}}';

            $('.delete-button').click(function () {

                var id = $(this).attr("data");
                var delete_url = url + "?id=" + id + "&return=" + returnURL;

                var retVal = confirm("Do you want to continue ?");
                if( retVal == true ) {
                    window.location = delete_url;
                }
            });

            $('.table-responsive').doubleScroll();


            $('#startDate').datepicker({
                language: "th",
                orientation: "auto left",
                autoclose: true,
                todayHighlight: true,
                format: "yyyy-mm-dd"
            });

            $('#endDate').datepicker({
                language: "th",
                orientation: "auto left",
                autoclose: true,
                todayHighlight: true,
                format: "yyyy-mm-dd"
            });

        });
    </script>
@stop
