@extends('layouts.app')

@section('content')
<section class="page-header row">
	<h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
	<ol class="breadcrumb">
		<li><a href="{{ url('') }}"> Dashboard </a></li>
		<li><a href="{{ url($pageModule) }}"> {{ $pageTitle }} </a></li>
		<li class="active"> View  </li>
	</ol>
</section>
<div class="page-content row">
	<div class="page-content-wrapper no-margin">

	<div class="sbox">
		<div class="sbox-title clearfix">
			<div class="sbox-tools pull-left" >
		   		<a href="{{ ($prevnext['prev'] != '' ? url('usersdemo/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm"><i class="fa fa-arrow-left"></i>  </a>
				<a href="{{ ($prevnext['next'] != '' ? url('usersdemo/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm "> <i class="fa fa-arrow-right"></i>  </a>
			</div>

			<div class="sbox-tools" >
				@if($access['is_add'] ==1)
		   		<a href="{{ url('usersdemo/'.$id.'/edit?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
				@endif
				<a href="{{ url('usersdemo?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>
			</div>
		</div>
		<div class="sbox-content">
			<div class="table-responsive">
				<table class="table table-striped " >
					<tbody>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Group Id', (isset($fields['group_id']['language'])? $fields['group_id']['language'] : array())) }}</td>
						<td>{{ $row->group_id}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Username', (isset($fields['username']['language'])? $fields['username']['language'] : array())) }}</td>
						<td>{{ $row->username}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Password', (isset($fields['password']['language'])? $fields['password']['language'] : array())) }}</td>
						<td>{{ $row->password}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Email', (isset($fields['email']['language'])? $fields['email']['language'] : array())) }}</td>
						<td>{{ $row->email}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('First Name', (isset($fields['first_name']['language'])? $fields['first_name']['language'] : array())) }}</td>
						<td>{{ $row->first_name}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Last Name', (isset($fields['last_name']['language'])? $fields['last_name']['language'] : array())) }}</td>
						<td>{{ $row->last_name}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Avatar', (isset($fields['avatar']['language'])? $fields['avatar']['language'] : array())) }}</td>
						<td>{{ $row->avatar}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Active', (isset($fields['active']['language'])? $fields['active']['language'] : array())) }}</td>
						<td>{{ $row->active}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Login Attempt', (isset($fields['login_attempt']['language'])? $fields['login_attempt']['language'] : array())) }}</td>
						<td>{{ $row->login_attempt}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Last Login', (isset($fields['last_login']['language'])? $fields['last_login']['language'] : array())) }}</td>
						<td>{{ $row->last_login}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Created At', (isset($fields['created_at']['language'])? $fields['created_at']['language'] : array())) }}</td>
						<td>{{ $row->created_at}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Updated At', (isset($fields['updated_at']['language'])? $fields['updated_at']['language'] : array())) }}</td>
						<td>{{ $row->updated_at}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Reminder', (isset($fields['reminder']['language'])? $fields['reminder']['language'] : array())) }}</td>
						<td>{{ $row->reminder}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Activation', (isset($fields['activation']['language'])? $fields['activation']['language'] : array())) }}</td>
						<td>{{ $row->activation}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Remember Token', (isset($fields['remember_token']['language'])? $fields['remember_token']['language'] : array())) }}</td>
						<td>{{ $row->remember_token}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Last Activity', (isset($fields['last_activity']['language'])? $fields['last_activity']['language'] : array())) }}</td>
						<td>{{ $row->last_activity}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Config', (isset($fields['config']['language'])? $fields['config']['language'] : array())) }}</td>
						<td>{{ $row->config}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Province Id', (isset($fields['province_id']['language'])? $fields['province_id']['language'] : array())) }}</td>
						<td>{{ $row->province_id}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Section', (isset($fields['section']['language'])? $fields['section']['language'] : array())) }}</td>
						<td>{{ $row->section}} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Department Id', (isset($fields['department_id']['language'])? $fields['department_id']['language'] : array())) }}</td>
						<td>{{ $row->department_id}} </td>

					</tr>

					</tbody>
				</table>



			</div>
		</div>
	</div>
	</div>
</div>
@stop
