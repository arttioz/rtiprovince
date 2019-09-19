@extends('layouts.login')

@section('content')

    <div class="text-center">

    </div>
    <h5 class="text-center m-t" style="text-transform: uppercase;"> {{ config('sximo.cnf_appdesc') }}  </h5>


    {!! Form::open(array('url'=>'user/create', 'class'=>'form-signup','parsley-validate'=>'','novalidate'=>' ','id'=>'register-form' ,'enctype' => 'multipart/form-data')) !!}
    @if(Session::has('message'))
        {!! Session::get('message') !!}
    @endif
    <ul class="parsley-error-list">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div class="form-group has-feedback">

        {!! Form::text('email', null, array('class'=>'form-control', 'required'=>'true','placeholder'=>"Email")) !!}
    </div>
    <div class="form-group has-feedback row">
        <div class="col-md-6">

            {!! Form::text('firstname', null, array('class'=>'form-control','required'=>'true' ,'placeholder'=>"ชื่อจริง" )) !!}

        </div>
        <div class="col-md-6">

            {!! Form::text('lastname', null, array('class'=>'form-control', 'required'=>'' ,'placeholder'=>"นามสกุล" )) !!}

        </div>
    </div>

    <div class="form-group has-feedback">
        <select name="user_level" class="form-control" required id="userlevel">
            <option value="" disabled selected>เลือกระดับผู้ใช้</option>
            @foreach($userslevel as $userlevel)

                <option value="{{$userlevel->id}}">
                    {{$userlevel->name}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group has-feedback" style="display: none" id="showDistrict">
        <select name="district_code" id="select_district" class="form-control">
            <option value="" disabled selected>เลือกระดับเขต</option>
            <option value="01">เขต 1</option>
            <option value="02">เขต 2</option>
            <option value="03">เขต 3</option>
            <option value="04">เขต 4</option>
            <option value="05">เขต 5</option>
            <option value="06">เขต 6</option>
            <option value="07">เขต 7</option>
            <option value="08">เขต 8</option>
            <option value="09">เขต 9</option>
            <option value="10">เขต 10</option>
            <option value="11">เขต 11</option>
            <option value="12">เขต 12</option>
            <option value="13">สปคม</option>
        </select>
    </div>

    <div class="form-group has-feedback">

        <select name="department_id" class="form-control" required>
            <option value="" disabled selected>สังกัดหน่วยงาน</option>
            @foreach($departments as $department)

                <option value="{{$department->id}}">
                    {{$department->name}}
                </option>
            @endforeach
        </select>


    </div>


    <div class="form-group has-feedback">
        <input name="section" type="text" class="form-control" placeholder="ชื่อหน่วยงาน"  value="" required>
    </div>

    <div class="form-group has-feedback" style="display: none;" id="showProvince">
        <select name="province_id" id="select_province"  class="form-control">
            <option value="" disabled selected>จังหวัดของหน่วยงาน</option>
            @foreach($locations as $location)
                <option value="{{$location->LOC_CODE}}">
                    {{$location->LOC_PROVINCE}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group has-feedback">
        <label> รูปบัตรประชนชน/บัตรข้าราชการ</label>
        <input  type="file" class="form-control" name="avatar"  required>
    </div>


    <div class="form-group has-feedback row">
        <div class="col-md-6">

            {!! Form::password('password', array('class'=>'form-control','required'=>'true' ,'placeholder'=>"รหัสผ่าน")) !!}

        </div>
        <div class="col-md-6">

            {!! Form::password('password_confirmation', array('class'=>'form-control','required'=>'true' ,'placeholder'=>"ยืนยันรหัสผ่าน")) !!}

        </div>
    </div>

    @if(config('sximo.cnf_recaptcha') =='true')
        <div class="form-group has-feedback  animated fadeInLeft delayp1">
            <label class="text-left"> Are u human ? </label>
            <div class="g-recaptcha" data-sitekey="6Le2bjQUAAAAABascn2t0WsRjZbmL6EnxFJUU1H_"></div>

            <div class="clr"></div>
        </div>
    @endif

    <div class="row form-group">
        <div class="col-sm-12">
            <button type="submit" style="width:100%;" class="btn btn-primary pull-right"><i class="icon-user-plus"></i> @lang('core.signup')	</button>
        </div>
    </div>
    <p style="padding:10px 0" class="text-center">
        <a href="{{ URL::to('user/login')}}"> @lang('core.signin')   </a> | <a href="{{ URL::to('')}}"> @lang('core.backtosite')   </a>
    </p>
    {!! Form::close() !!}

    <script type="text/javascript">

        var selectLevel;
        $(document).ready(function(){

            selectLevel = $("#userlevel");
            // $("#select_district").hide();
            // $('#select_province').hidden;

            setupView();
            setupUserLevelView();

        })

        function setupView() {
            $('#register-form').parsley();
            $('#select_province').select2();
        }

        function setupUserLevelView() {
            selectLevel.change(function () {
                let val = selectLevel.val()
                if(val == 1){
                    console.log("showDistrict")
                    document.getElementById("showProvince").style.display = "none";
                    document.getElementById("showDistrict").style.display = "block";
                    $("#select_district").attr('required', '');
                    $("#select_province").removeAttr('required');
                }else {
                    console.log("showProvince")
                    document.getElementById("showProvince").style.display = "block";
                    document.getElementById("showDistrict").style.display = "none";
                    $("#select_province").attr('required', '');
                    $("#select_district").removeAttr('required');
                }
            })
        }

    </script>
@stop
