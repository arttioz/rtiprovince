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

	{!! Form::open(array('url'=>'rtiprovincefiled?return='.$return, 'class'=>'form-horizontal validated','files' => true )) !!}
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
						<fieldset><legend> RTIProvinceFiled</legend>
									
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
										<label for="Province Code" class=" control-label col-md-4 text-left"> Province Code <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='province_code' id='province_code' value='{{ $row['province_code'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Rti Field Id" class=" control-label col-md-4 text-left"> Rti Field Id <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='rti_field_id' rows='5' id='rti_field_id' class='select2 '   ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Input Type" class=" control-label col-md-4 text-left"> Input Type <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='input_type' rows='5' id='input_type' class='select2 '   ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Style" class=" control-label col-md-4 text-left"> Style <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <textarea name='style' rows='5' id='style' class='form-control input-sm '  
				           >{{ $row['style'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Option" class=" control-label col-md-4 text-left"> Option <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <textarea name='option' rows='5' id='option' class='form-control input-sm '  
				           >{{ $row['option'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Is Enable" class=" control-label col-md-4 text-left"> Is Enable <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='is_enable' id='is_enable' value='{{ $row['is_enable'] }}' 
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
		
		
		
		$("#rti_field_id").jCombo("{!! url('rtiprovincefiled/comboselect?filter=rti_filed:id:name') !!}",
		{  selected_value : '{{ $row["rti_field_id"] }}' });
		
		$("#input_type").jCombo("{!! url('rtiprovincefiled/comboselect?filter=input_type_field:id:name') !!}",
		{  selected_value : '{{ $row["input_type"] }}' });
		 		 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("rtiprovincefiled/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop