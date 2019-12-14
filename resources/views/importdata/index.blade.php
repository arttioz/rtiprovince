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
          <div class="row">
              {!! Form::open(array('url'=>'importdata', 'id'=>'import-form', 'enctype' => 'multipart/form-data' )) !!}
              <div class="col-xs-3 col-sm-3 col-md-2">
                  <input type="file" name="import_file" id="import_file"  /><br>
                  <a href="{{url("template")}}"> ตัวอย่าง File นำเข้า </a>
              </div>
              <button  id="import-btn" style="margin-right: 10px; margin-top: -10px" class="btn btn-secondary col-xs-4 col-sm-3 col-md-2" type="submit"> Import ข้อมูล </button>
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>
</div>

@stop
