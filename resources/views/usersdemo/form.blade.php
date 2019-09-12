@extends('layouts.app')

@section('content')
<section class="page-header row">
	<h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
	<ol class="breadcrumb">
		<li><a href="{{ url('') }}"> Dashboard </a></li>
		<li><a href="{{ url($pageModule) }}"> {{ $pageTitle }} </a></li>
		<li class="active"> Form  </li>
	</ol>
</section>
<div class="page-content row">
	<div class="page-content-wrapper no-margin">

	{!! Form::open(array('url'=>'usersdemo?return='.$return, 'class'=>'form-horizontal validated','files' => true )) !!}
	<div class="sbox">
		<div class="sbox-title clearfix">
			<div class="sbox-tools " >
				<a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>
			</div>
			<div class="sbox-tools pull-left" >
				<button name="apply" class="tips btn btn-sm btn-default  "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-check"></i> {{ __('core.sb_apply') }} </button>
				<button name="save" class="tips btn btn-sm btn-default"  title="{{ __('core.btn_back') }}" ><i class="fa  fa-paste"></i> {{ __('core.sb_save') }} </button>
			</div>
		</div>
		<div class="sbox-content clearfix">
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
<div class="col-md-12">
						<fieldset><legend> UsersDemo</legend>

									  <div class="form-group  " >
										<label for="Id" class=" control-label col-md-4 text-left"> Id <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='id' id='id' value='{{ $row['id'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Group Id" class=" control-label col-md-4 text-left"> Group Id <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='group_id' id='group_id' value='{{ $row['group_id'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Username" class=" control-label col-md-4 text-left"> Username <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='username' id='username' value='{{ $row['username'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Password" class=" control-label col-md-4 text-left"> Password <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='password' id='password' value='{{ $row['password'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Email" class=" control-label col-md-4 text-left"> Email <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='email' id='email' value='{{ $row['email'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="First Name" class=" control-label col-md-4 text-left"> First Name <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='first_name' id='first_name' value='{{ $row['first_name'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Last Name" class=" control-label col-md-4 text-left"> Last Name <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='last_name' id='last_name' value='{{ $row['last_name'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Avatar" class=" control-label col-md-4 text-left"> Avatar <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='avatar' id='avatar' value='{{ $row['avatar'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Active" class=" control-label col-md-4 text-left"> Active <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='active' id='active' value='{{ $row['active'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Login Attempt" class=" control-label col-md-4 text-left"> Login Attempt <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='login_attempt' id='login_attempt' value='{{ $row['login_attempt'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Last Login" class=" control-label col-md-4 text-left"> Last Login <span class="asterix"> * </span></label>
										<div class="col-md-6">

				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('last_login', $row['last_login'],array('class'=>'form-control input-sm datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>

										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Created At" class=" control-label col-md-4 text-left"> Created At <span class="asterix"> * </span></label>
										<div class="col-md-6">

				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('created_at', $row['created_at'],array('class'=>'form-control input-sm datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>

										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Updated At" class=" control-label col-md-4 text-left"> Updated At <span class="asterix"> * </span></label>
										<div class="col-md-6">

				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('updated_at', $row['updated_at'],array('class'=>'form-control input-sm datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>

										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Reminder" class=" control-label col-md-4 text-left"> Reminder <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='reminder' id='reminder' value='{{ $row['reminder'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Activation" class=" control-label col-md-4 text-left"> Activation <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='activation' id='activation' value='{{ $row['activation'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Remember Token" class=" control-label col-md-4 text-left"> Remember Token <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='remember_token' id='remember_token' value='{{ $row['remember_token'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Last Activity" class=" control-label col-md-4 text-left"> Last Activity <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='last_activity' id='last_activity' value='{{ $row['last_activity'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Config" class=" control-label col-md-4 text-left"> Config <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <textarea name='config' rows='5' id='config' class='form-control input-sm '
				           >{{ $row['config'] }}</textarea>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Province Id" class=" control-label col-md-4 text-left"> Province Id <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='province_id' id='province_id' value='{{ $row['province_id'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Section" class=" control-label col-md-4 text-left"> Section <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='section' id='section' value='{{ $row['section'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group  " >
										<label for="Department Id" class=" control-label col-md-4 text-left"> Department Id <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='department_id' id='department_id' value='{{ $row['department_id'] }}'
						     class='form-control input-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div> </fieldset>
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
			var removeUrl = '{{ url("usersdemo/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();
			return false;
		});

	});
	</script>
@stop