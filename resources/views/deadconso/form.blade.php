@extends('layouts.app')

@section('content')
	{{--<section class="page-header row">--}}
	{{--<h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>--}}
	{{--<ol class="breadcrumb">--}}
	{{--<li><a href="{{ url('') }}"> Dashboard </a></li>--}}
	{{--<li><a href="{{ url($pageModule) }}"> {{ $pageTitle }} </a></li>--}}
	{{--<li class="active"> Form  </li>--}}
	{{--</ol>--}}
	{{--</section>--}}
	<div class="page-content row">
		<div class="page-content-wrapper no-margin">

			{!! Form::open(array('url'=>'deadconso?return='.$return, 'class'=>'form-horizontal validated','files' => true )) !!}
			<div class="sbox">
				<div class="sbox-title clearfix">
					<div class="sbox-tools " >
						<a href="{{ $url}}" class="tips btn btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>
					</div>
					<div class="sbox-tools pull-left" >
						{{--<button name="apply" class="tips btn btn-sm btn-default  "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-check"></i> {{ __('core.sb_apply') }} </button>--}}
						<button name="save" class="tips btn btn-sm btn-default"  title="{{ __('core.btn_back') }}" ><i class="fa  fa-paste"></i> บันทึก </button>
					</div>
				</div>
				<div class="sbox-content clearfix">
					<ul class="parsley-error-list">
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
					<div class="col-md-12">
						<fieldset><legend> ข้อมูลผู้เสียชีวิต </legend>

							<input type='hidden' name='url' id='url' value='{{ $url }}'
								   class='form-control input-sm ' />

							<div class="form-group  hide" >
								<label for="Id" class=" control-label col-md-4 text-left"> Id <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='hidden' name='id' id='id' value='{{ $row['id'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="DEAD CONSO ID" class=" control-label col-md-4 text-left"> DEAD CONSO ID <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='DEAD_CONSO_ID' id='DEAD_CONSO_ID' value='{{ $row['DEAD_CONSO_ID'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="DEAD YEAR" class=" control-label col-md-4 text-left"> DEAD YEAR <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='DEAD_YEAR' id='DEAD_YEAR' value='{{ $row['DEAD_YEAR'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="AccNo" class=" control-label col-md-4 text-left"> AccNo <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='AccNo' id='AccNo' value='{{ $row['AccNo'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Prefix" class=" control-label col-md-4 text-left"> คำนำหน้าชื่อ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='Prefix' id='Prefix' value='{{ $row['Prefix'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>

							<div class="form-group  " >
								<label for="Fname" class=" control-label col-md-4 text-left"> ชื่อจริง <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='Fname' id='Fname' value='{{ $row['Fname'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Lname" class=" control-label col-md-4 text-left"> นามสกุล <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='Lname' id='Lname' value='{{ $row['Lname'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>

							<div class="form-group  " >
								<label for="DrvSocNO" class=" control-label col-md-4 text-left"> เลขบัตรประชาชน <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='DrvSocNO' id='DrvSocNO' value='{{ $row['DrvSocNO'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Age" class=" control-label col-md-4 text-left"> อายุ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='Age' id='Age' value='{{ $row['Age'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Sex" class=" control-label col-md-4 text-left"> เพศ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<select name="Sex" id="Sex">
										<option @if($row['Sex'] == 1) selected @endif value="1"> ชาย </option>
										<option @if($row['Sex'] == 2) selected @endif value="2"> หญิง </option>
									</select>

								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="BirthDate" class=" control-label col-md-4 text-left"> วันเกิด <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='date' name='BirthDate' id='BirthDate' value='{{ $row['BirthDate'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="CareerId" class=" control-label col-md-4 text-left"> CareerId <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='CareerId' id='CareerId' value='{{ $row['CareerId'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="NationalityId" class=" control-label col-md-4 text-left"> NationalityId <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='NationalityId' id='NationalityId' value='{{ $row['NationalityId'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="Tumbol" class=" control-label col-md-4 text-left"> Tumbol <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='Tumbol' id='Tumbol' value='{{ $row['Tumbol'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="District" class=" control-label col-md-4 text-left"> District <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='District' id='District' value='{{ $row['District'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="Province" class=" control-label col-md-4 text-left"> Province <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='Province' id='Province' value='{{ $row['Province'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="RiskAlgohol" class=" control-label col-md-4 text-left"> RiskAlgohol <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='RiskAlgohol' id='RiskAlgohol' value='{{ $row['RiskAlgohol'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="RiskHelmet" class=" control-label col-md-4 text-left"> RiskHelmet <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='RiskHelmet' id='RiskHelmet' value='{{ $row['RiskHelmet'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="RiskSafetyBelt" class=" control-label col-md-4 text-left"> RiskSafetyBelt <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='RiskSafetyBelt' id='RiskSafetyBelt' value='{{ $row['RiskSafetyBelt'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="DeadDate" class=" control-label col-md-4 text-left"> วันที่เสียชีวิต  <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='date' name='DeadDate' id='DeadDate' value='{{ $row['DeadDate'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="VictimNO" class=" control-label col-md-4 text-left"> VictimNO <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='VictimNO' id='VictimNO' value='{{ $row['VictimNO'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="CarLicense" class=" control-label col-md-4 text-left"> CarLicense <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='CarLicense' id='CarLicense' value='{{ $row['CarLicense'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="CarProv" class=" control-label col-md-4 text-left"> CarProv <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='CarProv' id='CarProv' value='{{ $row['CarProv'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group hide" >
								<label for="TypeMotor" class=" control-label col-md-4 text-left"> TypeMotor <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='TypeMotor' id='TypeMotor' value='{{ $row['TypeMotor'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="CarBand" class=" control-label col-md-4 text-left"> CarBand <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='CarBand' id='CarBand' value='{{ $row['CarBand'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="DrvName" class=" control-label col-md-4 text-left"> DrvName <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='DrvName' id='DrvName' value='{{ $row['DrvName'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="DrvAddress" class=" control-label col-md-4 text-left"> DrvAddress <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='DrvAddress' id='DrvAddress' value='{{ $row['DrvAddress'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="DrvAddProv" class=" control-label col-md-4 text-left"> DrvAddProv <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='DrvAddProv' id='DrvAddProv' value='{{ $row['DrvAddProv'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="TpNo" class=" control-label col-md-4 text-left"> TpNo <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='TpNo' id='TpNo' value='{{ $row['TpNo'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="DateRec" class=" control-label col-md-4 text-left"> DateRec <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='DateRec' id='DateRec' value='{{ $row['DateRec'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="TimeRec" class=" control-label col-md-4 text-left"> TimeRec <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='TimeRec' id='TimeRec' value='{{ $row['TimeRec'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="NCAUSE" class=" control-label col-md-4 text-left"> ICD10 การตาย <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='NCAUSE' id='NCAUSE' value='{{ $row['NCAUSE'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>

							<div class="form-group  " >
								<label for="Vehicle" class=" control-label col-md-4 text-left"> พาหนะ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='Vehicle' id='Vehicle' value='{{ $row['Vehicle'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>

							<div class="form-group  " >
								<label for="AccProv" class=" control-label col-md-4 text-left"> จังหวัดที่ตาย <span class="asterix"> * </span></label>
								<div class="col-md-6">

									<select name="DeathProv">

										@if( Auth::user()->group_id == 1)
											@foreach($location as $prov)

												<option  @if($DeathProv->LOC_CODE == $prov->LOC_CODE) selected  @endif value="{{$prov->LOC_CODE}}">{{$prov->LOC_PROVINCE}}</option>

											@endforeach
										@else
											@foreach($location as $prov)
												@if($DeathProv->LOC_CODE == $prov->LOC_CODE)
													<option  selected  value="{{$prov->LOC_CODE}}">{{$prov->LOC_PROVINCE}}</option>
												@endif
											@endforeach
										@endif



									</select>
								</div>
								<div class="col-md-2">

								</div>
							</div>

							<div class="form-group  " >
								<label for="AccProv" class=" control-label col-md-4 text-left"> จังหวัดที่เกิดเหตุ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<select name="AccProv">
										@foreach($location as $prov)
											<option  @if($AccProv->LOC_CODE == $prov->LOC_CODE)  selected @endif  value="{{$prov->LOC_CODE}}">{{$prov->LOC_PROVINCE}}</option>
										@endforeach

									</select>
									{{--<input  type='text' name='AccProv' id='AccProv' value='{{ $row['AccProv'] }}'--}}
									{{--class='form-control input-sm ' />--}}
								</div>
								<div class="col-md-2">

								</div>
							</div>


							<div class="form-group  " >
								<label for="AccDist" class=" control-label col-md-4 text-left"> อำเภอที่เกิดเหตุ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='AccDist' id='AccDist' value='{{ $row['AccDist'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="AccSubDist" class=" control-label col-md-4 text-left"> ตำบลที่เกิดเหตุ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='AccSubDist' id='AccSubDist' value='{{ $row['AccSubDist'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>


							<div class="form-group  " >
								<label for="AccLatlong" class=" control-label col-md-4 text-left"> Latitude ที่เกิดเหตุ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='AccLatlong' id='AccLatlong' value='{{ $row['AccLatlong'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="Acclong" class=" control-label col-md-4 text-left">  Longitude ที่เกิดเหตุ <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='Acclong' id='Acclong' value='{{ $row['Acclong'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="IS DEATH CERT" class=" control-label col-md-4 text-left"> IS DEATH CERT <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='IS_DEATH_CERT' id='IS_DEATH_CERT' value='{{ $row['IS_DEATH_CERT'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="IS E CLAIM" class=" control-label col-md-4 text-left"> IS E CLAIM <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='IS_E_CLAIM' id='IS_E_CLAIM' value='{{ $row['IS_E_CLAIM'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="IS POLIS" class=" control-label col-md-4 text-left"> IS POLIS <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='IS_POLIS' id='IS_POLIS' value='{{ $row['IS_POLIS'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  hide" >
								<label for="PROTOCOL" class=" control-label col-md-4 text-left"> PROTOCOL <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<input  type='text' name='PROTOCOL' id='PROTOCOL' value='{{ $row['PROTOCOL'] }}'
											class='form-control input-sm ' />
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  " >
								<label for="REMARK" class=" control-label col-md-4 text-left"> REMARK <span class="asterix"> * </span></label>
								<div class="col-md-6">
										  <textarea name='REMARK' rows='5' id='REMARK' class='form-control input-sm '
										  >{{ $row['REMARK'] }}</textarea>
								</div>
								<div class="col-md-2">

								</div>
							</div>

						</fieldset>
					</div>


					<div class="sbox-tools pull-right" >
						{{--<button name="apply" class="tips btn btn-sm btn-default  "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-check"></i> {{ __('core.sb_apply') }} </button>--}}
						<button name="save" class="tips btn btn-sm btn-primary"  title="{{ __('core.btn_back') }}" ><i class="fa  fa-paste"></i> บันทึก </button>
					</div>
				</div>

			</div>
			<input type="hidden" name="action_task" value="save" />

			{!! Form::close() !!}
		</div>
	</div>


	<script type="text/javascript">
        $(document).ready(function() {




            $('.removeMultiFiles').on('click',function(){
                var removeUrl = '{{ url("deadconso/removefiles?file=")}}'+$(this).attr('url');
                $(this).parent().remove();
                $.get(removeUrl,function(response){});
                $(this).parent('div').empty();
                return false;
            });

        });
	</script>
@stop