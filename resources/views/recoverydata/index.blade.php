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
        <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
      </div>
      <div class="sbox-content">

          TO DO CREATE TABLE WITH PAGINATION
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
                          <td scope="col" style="font-size: 10px">{{$item->Source}}</td>

                      </tr>
                  @endforeach
                  </tbody>
              </table>

          </div>
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
    });

</script>
@stop