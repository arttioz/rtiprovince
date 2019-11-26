

		 {!! Form::open(array('url'=>'rtiprovincefiled', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
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
			
			

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-default btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-default btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 <input type="hidden" name="action_task" value="public" />
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#rti_field_id").jCombo("{!! url('rtiprovincefiled/comboselect?filter=rti_filed:id:name') !!}",
		{  selected_value : '{{ $row["rti_field_id"] }}' });
		
		$("#input_type").jCombo("{!! url('rtiprovincefiled/comboselect?filter=input_type_field:id:name') !!}",
		{  selected_value : '{{ $row["input_type"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
