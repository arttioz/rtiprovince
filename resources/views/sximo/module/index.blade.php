@extends('layouts.app')

@section('content')
<div class="page-content row">
    <div class="page-content-wrapper m-t">

        <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink ">
                        <div class="icon">
                            <i class="material-icons">control_point_duplicate</i>
                        </div>
                        <div class="content">
                            <a href="{{ url('sximo/module/create') }}" class="clear">
                                <div class="text">NEW MODULE </div>
                                <p>{{ Lang::get('core.fr_createmodule') }}  </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan ">
                        <div class="icon">
                            <i class="material-icons">archive</i>
                        </div>
                        <div class="content">
                            <a href="{{ url('sximo/module/package') }}" class="clear post_url">
                                <div class="text">BACKUP MODULE</div>
                                <p>{{ Lang::get('core.fr_backupmodule') }}</p>
                            </a>    
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green ">
                        <div class="icon">
                            <i class="material-icons">storage</i>
                        </div>
                        <div class="content">
                            <a href="{{ url('sximo/tables') }}" class="clear " >
                                <div class="text">PHP MYADMIN</div>
                                <p > Manage Database Table </p> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange ">
                        <div class="icon">
                            <i class="material-icons">transform</i>
                        </div>
                        <div class="content">
                            <a href="{{ url('sximo/rac') }}" class="clear ">
                                <div class="text">REST API</div>
                                <p > Token / Authentication  </p>
                            </a>     
                        </div>
                    </div>
                </div>
            </div>

        <div class="sbox bg-gray">
            <div class="sbox-content">

                

                <div class="p-sm m-b unziped" style=" padding: 5px 5px 30px ; margin-bottom:10px;">
                {!! Form::open(array('url'=>'sximo/module/install/', 'class'=>'breadcrumb-search','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
                <h4>Select File <small>( Module zip installer ) </small></h4>
                <p>  <input type="file" name="installer" required style="float:left;">  <button type="submit" class="btn btn-primary btn-sm" style="float:left;"  ><i class=" fa fa-cloud-upload "></i> Upload &  Install</button></p>
                </form>
                <div class="clr" style="clear: both;"></div>
                </div> 
                <hr />   

                    <ul class="nav nav-tabs" style="margin-bottom:10px;">
                        <li @if($type =='addon') class="active" @endif><a href="{{ url('sximo/module')}}"> {{ Lang::get('core.tab_installed') }}  </a></li>
                        <li @if($type =='core') class="active" @endif><a href="{{ url('sximo/module?t=core')}}"> {{ Lang::get('core.tab_core') }}</a></li>
                    </ul>     

                    @if($type =='core')

                     <div class="infobox infobox-info fade in">
                      <button type="button" class="close" data-dismiss="alert"> x </button>  
                      <p>   Do not <b>Rebuild</b> or Change any Core Module </p>    
                    </div>  
                     
                    @endif

        <div class="table-responsive"  style="min-height:400px; padding-bottom: 200px;"> 


        {!! Form::open(array('url'=>'sximo/module/package#', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) !!}

        @if(count($rowData) >=1) 
        <table class="table table-hover  ">
            <thead>
            <tr>
                <th>Action</th>                 
                <th><input type="checkbox" class="checkall minimal-green" /></th>
                <th>Module</th>
                <th>Type</th>
                
                <th>Controller</th>
                <th>Database</th>
                <th>PRI</th>
                <th>Created</th>

            </tr>
            </thead>
        <tbody>
        @foreach ($rowData as $row)
            <tr>        
                <td>
                <div class="btn-group ">
                <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"> Action </span>
                </button>
                    <ul  class="dropdown-menu icons-right " style="z-index: 999999">
                        @if($type != 'core')
                        <li><a href="{{ url($row->module_name)}}"> {{ Lang::get('core.btn_view') }} Module </a></li>
                        <li><a href="{{ url('sximo/module/duplicate/'.$row->module_id)}}" onclick="SximoModal(this.href,'Duplicate/Clone Module'); return false;" > Duplicate/Clone </a></li>                       
                        @endif
                        <li><a href="{{ url('sximo/module/config/'.$row->module_name)}}"> {{ Lang::get('core.btn_edit') }}</a></li> 
                        
                        @if($type != 'core')
                        <li><a href="javascript://ajax" onclick="SximoConfirmDelete('{{ url('sximo/module/destroy/'.$row->module_id)}}')"> {{ Lang::get('core.btn_remove') }}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('sximo/module/rebuild/'.$row->module_id)}}"> Rebuild All Codes</a></li>
                        @endif
                    </ul>
                </div>                  
                </td>
                <td>
                 
                <input type="checkbox" class="ids minimal-green" name="id[]" value="{{ $row->module_id }}" /> </td>
                <td>{{ $row->module_title }} </td>
                <td>{{ $row->module_type }} </td>
                <td>{{ $row->module_name }} </td>

                <td>{{ $row->module_db }} </td>
                <td>{{ $row->module_db_key }} </td>
                <td>{{ $row->module_created }} </td>
            </tr>
        @endforeach 
        </tbody>        
        </table>
        {!! Form::close() !!}
        </div>
        @else

        <p class="text-center" style="padding:50px 0;">{{ Lang::get('core.norecord') }} 
        <br /><br />
        <a href="{{ url('sximo/module/create')}}" class="btn btn-primary btn-sm "><i class="fa fa-plus"></i> {{ Lang::get('core.fr_createmodule') }} </a>
         </p>   
        @endif
        </div>

            </div>
        </div>
    </div>
</div>


  <script language='javascript' >
  jQuery(document).ready(function($){
    $('.post_url').click(function(e){
      e.preventDefault();
      if( ( $('.ids',$('#SximoTable')).is(':checked') )==false ){
        alert( $(this).attr('data-title') + " not selected");
        return false;
      }
      $('#SximoTable').attr({'action' : $(this).attr('href') }).submit();
    });


  })
  </script>        

 



@stop