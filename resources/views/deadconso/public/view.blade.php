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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('DEAD CONSO ID', (isset($fields['DEAD_CONSO_ID']['language'])? $fields['DEAD_CONSO_ID']['language'] : array())) }}</td>
						<td>{{ $row->DEAD_CONSO_ID}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('DEAD YEAR', (isset($fields['DEAD_YEAR']['language'])? $fields['DEAD_YEAR']['language'] : array())) }}</td>
						<td>{{ $row->DEAD_YEAR}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('AccNo', (isset($fields['AccNo']['language'])? $fields['AccNo']['language'] : array())) }}</td>
						<td>{{ $row->AccNo}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Fname', (isset($fields['Fname']['language'])? $fields['Fname']['language'] : array())) }}</td>
						<td>{{ $row->Fname}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Lname', (isset($fields['Lname']['language'])? $fields['Lname']['language'] : array())) }}</td>
						<td>{{ $row->Lname}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Prefix', (isset($fields['Prefix']['language'])? $fields['Prefix']['language'] : array())) }}</td>
						<td>{{ $row->Prefix}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('DrvSocNO', (isset($fields['DrvSocNO']['language'])? $fields['DrvSocNO']['language'] : array())) }}</td>
						<td>{{ $row->DrvSocNO}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Age', (isset($fields['Age']['language'])? $fields['Age']['language'] : array())) }}</td>
						<td>{{ $row->Age}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Sex', (isset($fields['Sex']['language'])? $fields['Sex']['language'] : array())) }}</td>
						<td>{{ $row->Sex}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('BirthDate', (isset($fields['BirthDate']['language'])? $fields['BirthDate']['language'] : array())) }}</td>
						<td>{{ $row->BirthDate}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('CareerId', (isset($fields['CareerId']['language'])? $fields['CareerId']['language'] : array())) }}</td>
						<td>{{ $row->CareerId}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('NationalityId', (isset($fields['NationalityId']['language'])? $fields['NationalityId']['language'] : array())) }}</td>
						<td>{{ $row->NationalityId}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tumbol', (isset($fields['Tumbol']['language'])? $fields['Tumbol']['language'] : array())) }}</td>
						<td>{{ $row->Tumbol}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('District', (isset($fields['District']['language'])? $fields['District']['language'] : array())) }}</td>
						<td>{{ $row->District}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Province', (isset($fields['Province']['language'])? $fields['Province']['language'] : array())) }}</td>
						<td>{{ $row->Province}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('RiskAlgohol', (isset($fields['RiskAlgohol']['language'])? $fields['RiskAlgohol']['language'] : array())) }}</td>
						<td>{{ $row->RiskAlgohol}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('RiskHelmet', (isset($fields['RiskHelmet']['language'])? $fields['RiskHelmet']['language'] : array())) }}</td>
						<td>{{ $row->RiskHelmet}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('RiskSafetyBelt', (isset($fields['RiskSafetyBelt']['language'])? $fields['RiskSafetyBelt']['language'] : array())) }}</td>
						<td>{{ $row->RiskSafetyBelt}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('DeadDate', (isset($fields['DeadDate']['language'])? $fields['DeadDate']['language'] : array())) }}</td>
						<td>{{ $row->DeadDate}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('VictimNO', (isset($fields['VictimNO']['language'])? $fields['VictimNO']['language'] : array())) }}</td>
						<td>{{ $row->VictimNO}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('CarLicense', (isset($fields['CarLicense']['language'])? $fields['CarLicense']['language'] : array())) }}</td>
						<td>{{ $row->CarLicense}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('CarProv', (isset($fields['CarProv']['language'])? $fields['CarProv']['language'] : array())) }}</td>
						<td>{{ $row->CarProv}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('TypeMotor', (isset($fields['TypeMotor']['language'])? $fields['TypeMotor']['language'] : array())) }}</td>
						<td>{{ $row->TypeMotor}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('CarBand', (isset($fields['CarBand']['language'])? $fields['CarBand']['language'] : array())) }}</td>
						<td>{{ $row->CarBand}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('DrvName', (isset($fields['DrvName']['language'])? $fields['DrvName']['language'] : array())) }}</td>
						<td>{{ $row->DrvName}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('DrvAddress', (isset($fields['DrvAddress']['language'])? $fields['DrvAddress']['language'] : array())) }}</td>
						<td>{{ $row->DrvAddress}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('DrvAddProv', (isset($fields['DrvAddProv']['language'])? $fields['DrvAddProv']['language'] : array())) }}</td>
						<td>{{ $row->DrvAddProv}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('TpNo', (isset($fields['TpNo']['language'])? $fields['TpNo']['language'] : array())) }}</td>
						<td>{{ $row->TpNo}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('DateRec', (isset($fields['DateRec']['language'])? $fields['DateRec']['language'] : array())) }}</td>
						<td>{{ $row->DateRec}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('TimeRec', (isset($fields['TimeRec']['language'])? $fields['TimeRec']['language'] : array())) }}</td>
						<td>{{ $row->TimeRec}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('AccSubDist', (isset($fields['AccSubDist']['language'])? $fields['AccSubDist']['language'] : array())) }}</td>
						<td>{{ $row->AccSubDist}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('AccDist', (isset($fields['AccDist']['language'])? $fields['AccDist']['language'] : array())) }}</td>
						<td>{{ $row->AccDist}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('AccProv', (isset($fields['AccProv']['language'])? $fields['AccProv']['language'] : array())) }}</td>
						<td>{{ $row->AccProv}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('AccLatlong', (isset($fields['AccLatlong']['language'])? $fields['AccLatlong']['language'] : array())) }}</td>
						<td>{{ $row->AccLatlong}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Acclong', (isset($fields['Acclong']['language'])? $fields['Acclong']['language'] : array())) }}</td>
						<td>{{ $row->Acclong}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('IS DEATH CERT', (isset($fields['IS_DEATH_CERT']['language'])? $fields['IS_DEATH_CERT']['language'] : array())) }}</td>
						<td>{{ $row->IS_DEATH_CERT}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('IS E CLAIM', (isset($fields['IS_E_CLAIM']['language'])? $fields['IS_E_CLAIM']['language'] : array())) }}</td>
						<td>{{ $row->IS_E_CLAIM}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('IS POLIS', (isset($fields['IS_POLIS']['language'])? $fields['IS_POLIS']['language'] : array())) }}</td>
						<td>{{ $row->IS_POLIS}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('PROTOCOL', (isset($fields['PROTOCOL']['language'])? $fields['PROTOCOL']['language'] : array())) }}</td>
						<td>{{ $row->PROTOCOL}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('REMARK', (isset($fields['REMARK']['language'])? $fields['REMARK']['language'] : array())) }}</td>
						<td>{{ $row->REMARK}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('NCAUSE', (isset($fields['NCAUSE']['language'])? $fields['NCAUSE']['language'] : array())) }}</td>
						<td>{{ $row->NCAUSE}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	