@extends('layouts.app')
@section('content')
<section class="page-header row">
    <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li  class="active"> {{ $pageTitle }} </li>
    </ol>
  </section>

<div class="page-content row">
  <div class="page-content-wrapper no-margin">

    <div class="sbox">

        <div class="sbox-title">
{{--            {!! Form::open(array('url'=>'recovery', 'class'=>'','parsley-validate'=>'','novalidate'=>' ','id'=>'search-form', 'method'=>'get' )) !!}--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-12 col-sm-3 label-search">--}}
{{--                    <label class="col-xs-12 col-sm-12" for="daterange">ตั้งแต่</label>--}}
{{--                    <input type="text" class="form-control" name="start" id="startDate" autocomplete="off" value="{{$startdate}}"/>--}}
{{--                </div>--}}
{{--                <div class="col-xs-12 col-sm-3 label-search">--}}
{{--                    <label class="col-xs-12 col-sm-12" for="daterange">ถึง</label>--}}
{{--                    <input type="text" class="form-control" name="end" id="endDate" autocomplete="off" value="{{$enddate}}"/>--}}
{{--                </div>--}}
{{--                <div class="col-xs-12 col-sm-3 label-search">--}}
{{--                    <label class="col-xs-12 col-sm-12" for="daterange">จังหวัดที่เสียชีวิต</label>--}}
{{--                    <select name="province_id" id="province_id" class="form-control" required>--}}
{{--                        <option value="" disabled selected>กรุณาเลือก</option>--}}
{{--                        @foreach($locations as $location)--}}

{{--                            <option @if($province_id == $location->LOC_CODE) selected @endif--}}
{{--                            value="{{$location->LOC_CODE}}">--}}
{{--                                {{$location->LOC_PROVINCE}}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="col-xs-12 col-sm-3 label-search">--}}
{{--                    <label class="col-xs-12 col-sm-12" for="daterange">เลขที่บัตรประชาชน</label>--}}
{{--                    <input class="form-control"  type="text" name="citizen_id" value="" placeholder="เลขที่บัตรประชาชน 13 หลัก">--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="row" style="margin-top: 15px !important;">--}}
{{--                <button id="search-btn" class="btn btn-primary col-xs-12 col-sm-3 pull-right" type="submit"> ค้นหา </button>--}}
{{--            </div>--}}

{{--            {!! Form::close() !!}--}}
        </div>

      <div class="sbox-title">
        <h1> ข้อมูลที่ถูกลบ <small> {{ $pageNote }} </small></h1>
      </div>
      <div class="sbox-content">

{{--          TO DO CREATE TABLE WITH PAGINATION--}}
          <div class="table-responsive">
              <table class="table table-bordered "    >
                  <thead>
                  <tr>
                      <th scope="col">กู้ข้อมูล</th>
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
                  @foreach($recovery_data as $item)
                      <tr>
                          <td scope="col" ><button class="recovery-btn"  data="{{$item->id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button></td>
                          <td scope="col">{{$item->id}}</td>
                          <td scope="col">{{$item->Prefix}}</td>
                          <td scope="col">{{$item->Fname}}</td>
                          <td scope="col">{{$item->Lname}}</td>
                          <td scope="col">{{$item->DrvSocNO}}</td>
                          <td scope="col">{{$item->Age}}</td>
                          <td scope="col">{{$item->Gender}}</td>
                          <td scope="col">{{ (new \Carbon\Carbon($item->BirthDate))->format("Y-m-d")}}</td>
                          <td scope="col">{{ (new \Carbon\Carbon($item->DeadDate))->format("Y-m-d") }}</td>
                          <td scope="col">{{$item->NCAUSE}}</td>
                          <td scope="col">{{$item->Vehicle}}</td>
                          <td scope="col">{{$item->AccSubDist}}</td>
                          <td scope="col">{{$item->AccDist}}</td>
                          <td scope="col">{{$item->AccProv}}</td>
                          <td scope="col">{{$item->DeathProv}}</td>
                          <td scope="col">{{$item->Latlong}}</td>
                          <td scope="col" style="font-size: 10px">{{$item->upload_name}}</td>

                      </tr>
                  @endforeach
                  </tbody>
              </table>

          </div>
          {{ $recovery_data->appends(Request::except('page'))->links() }}
      </div>
    </div>
  </div>
</div>

<script>


    $(function() {
        var returnURL = '{{urlencode( url()->full() )}}';
        var url = '{{url("recovery")}}';

        $('.recovery-btn').click(function () {

            var id = $(this).attr("data");
            var recovery_url = url + "?id=" + id + "&return=" + returnURL;

            var retVal = confirm("Do you want to continue ?");
            if( retVal == true ) {
                window.location = recovery_url;
            }
        });

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