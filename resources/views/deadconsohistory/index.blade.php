@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<section class="page-header row">
	<h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
{{--	<h2> ประวัติการแก้ไข <small> {{ $pageNote }} </small></h2>--}}

	<ol class="breadcrumb">
		<li><a href="{{ url('') }}"> Dashboard </a></li>
		<li class="active"> {{ $pageTitle }} </li>		
	</ol>
</section>
<div class="page-content row">
	<div class="page-content-wrapper no-margin">

		<div class="sbox">
			<div class="sbox-title">
				<h1> ประวัติการแก้ไข <small> </small></h1>
				<div class="sbox-tools">
					@if(Session::get('gid') ==1)
						<a href="{{ url($pageModule) }}" class="tips btn btn-sm  " title=" {{ __('core.btn_reload') }}" ><i class="fa  fa-refresh"></i></a>
						<a href="{{ url('sximo/module/config/'.$pageModule) }}" class="tips btn btn-sm  " title=" {{ __('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
					@endif
				</div>
			</div>
			<div class="sbox-content">
			<!-- Toolbar Top -->

			<div class="row">
				<div class="col-md-4">
{{--					@if($access['is_add'] ==1)--}}
{{--					<a href="{{ url('deadconsohistory/create?return='.$return) }}" class="btn btn-default btn-sm"--}}
{{--						title="{{ __('core.btn_create') }}"><i class=" fa fa-plus "></i> Create New </a>--}}
{{--					@endif--}}

{{--					<div class="btn-group">--}}
{{--						<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-menu5"></i> Bulk Action </button>--}}
{{--				        <ul class="dropdown-menu">--}}
{{--				         @if($access['is_excel'] ==1)--}}
{{--							<li><a href="{{ url( $pageModule .'/export?do=excel&return='.$return) }}"><i class="fa fa-download"></i> Export CSV </a></li>--}}
{{--						@endif--}}
{{--						@if($access['is_add'] ==1)--}}
{{--							<li><a href="{{ url($pageModule .'/import?return='.$return) }}" onclick="SximoModal(this.href, 'Import CSV'); return false;"><i class="fa fa-cloud-upload"></i> Import CSV</a></li>--}}
{{--							<li><a href="javascript://ajax" class=" copy " title="Copy" ><i class="fa fa-copy"></i> Copy selected</a></li>--}}
{{--						@endif--}}
{{--							<li><a href="{{ url($pageModule) }}"  ><i class="fa fa-times"></i> Clear Search </a></li>--}}
{{--				          	<li role="separator" class="divider"></li>--}}
{{--				         @if($access['is_remove'] ==1)--}}
{{--							 <li><a href="javascript://ajax"  onclick="SximoDelete();" class="tips" title="{{ __('core.btn_remove') }}"><i class="fa fa-trash-o"></i>--}}
{{--							Remove Selected </a></li>--}}
{{--						@endif--}}

{{--				        </ul>--}}
{{--				    </div>--}}
				</div>
				<div class="col-md-4 pull-right">
					<div class="input-group">
					      <div class="input-group-btn">
					        <button type="button" class="btn btn-default btn-sm "
					        onclick="SximoModal('{{ url($pageModule."/search") }}','Advance Search'); " ><i class="fa fa-filter"></i> Filter </button>
					      </div><!-- /btn-group -->
					      <input type="text" class="form-control input-sm onsearch" data-target="{{ url($pageModule) }}" aria-label="..." placeholder=" Type And Hit Enter ">
					    </div>
				</div>
			</div>
			<!-- End Toolbar Top -->

				<div class="table-responsive">
					<table class="table table-bordered "    >
						<thead>
						<tr>
							<th scope="col"></th>
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
						@foreach($deadconsohistorys as $item)
							<tr>
								<td scope="col" ><i class="fa fa-history" aria-hidden="true"></i></td>
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
								<td scope="col">{{$item->AccLatlong}},<br>{{$item->Acclong}}</td>
								<td scope="col" style="font-size: 10px">{{$item->upload_name}}</td>

							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
{{--				{{ $deadconsohistorys->appends(Request::except('page'))->links() }}--}}
			</div>
		</div>
	</div>
</div>


<script>
$(document).ready(function(){
	$('.copy').click(function() {
		var total = $('input[class="ids"]:checkbox:checked').length;
		if(confirm('are u sure Copy selected rows ?'))
		{
			$('input[name="action_task"]').val('copy');
			$('#SximoTable').submit();// do the rest here	
		}
	})	
	
});	
</script>	
	
@stop
