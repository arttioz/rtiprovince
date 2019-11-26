<div class="m-t" style="padding-top:25px;">	
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-responsive" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
			
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Province Code', (isset($fields['province_code']['language'])? $fields['province_code']['language'] : array())) }}</td>
						<td>{{ $row->province_code}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Rti Field Id', (isset($fields['rti_field_id']['language'])? $fields['rti_field_id']['language'] : array())) }}</td>
						<td>{{ $row->rti_field_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Input Type', (isset($fields['input_type']['language'])? $fields['input_type']['language'] : array())) }}</td>
						<td>{{ $row->input_type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Style', (isset($fields['style']['language'])? $fields['style']['language'] : array())) }}</td>
						<td>{{ $row->style}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Option', (isset($fields['option']['language'])? $fields['option']['language'] : array())) }}</td>
						<td>{{ $row->option}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Is Enable', (isset($fields['is_enable']['language'])? $fields['is_enable']['language'] : array())) }}</td>
						<td>{{ $row->is_enable}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	