<nav class="navbar">
  <div class="container-fluid">
      <div class="navbar-header">
           <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
          <a href="javascript:void(0);" class="bars"></a>

          <a class="navbar-brand" href="{{ url('dashboard')}}">

              <img src="{{ asset('images/moph.png')}}" width="40" />


              {{--@if(file_exists(public_path().'/uploads/images/'.config('sximo')['cnf_logo']) && config('sximo')['cnf_logo'] !='')--}}
                {{--<img src="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" alt="{{ config('sximo')['cnf_appname'] }}" width="40" />--}}
                {{--@else--}}
                {{--<img src="{{ asset('uploads/logo.png')}}" alt="{{ config('sximo')['cnf_appname'] }}" width="40" />--}}
                {{--@endif--}}
            
                <div> {{ config('sximo')['cnf_appname'] }} </div>
          </a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav ">
              <li class="collapse" >
                  <a href="javascript:;"  class="sidemenu"  >
                      <i class="material-icons">menu</i>
                  </a>
             </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            {{--<li class="sidemenu-bar">--}}
                  {{--<a href="{{ url('') }}" >--}}
                      {{--<i class="material-icons">place</i>--}}
                  {{--</a>--}}
             {{--</li>     --}}
                          <!-- Notifications -->
              @if(config('sximo.cnf_multilang') ==1)
            <li class="dropdown tasks-menu ">
              <?php
              $flag ='en';
              $langname = 'English';
              foreach(SiteHelpers::langOption() as $lang):
                if($lang['folder'] == session('lang') or $lang['folder'] == config('sximo.cnf_lang')) {
                  $flag = $lang['folder'];
                  $langname = $lang['name'];
                }

              endforeach;?>
              <a href="#"  data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img class="flag-lang" src="{{ asset('sximo5/images/flags/'.$flag.'.png') }}" width="16" height="12" alt="lang" /> {{ strtoupper($flag) }}
                <span class="hidden-xs">

                </span>
              </a>

               <ul class="dropdown-menu dropdown-menu-right icons-right">
                @foreach(SiteHelpers::langOption() as $lang)
                  <li><a href="{{ url('home/lang/'.$lang['folder'])}}"><img class="flag-lang" src="{{ asset('sximo5/images/flags/'. $lang['folder'].'.png')}}" width="16" height="11" alt="lang"  /> {{  $lang['name'] }}</a></li>
                @endforeach
              </ul>

            </li>
            @endif 
                        
              {{--<li class="dropdown">--}}
                  {{--<a href="javascript:void(0);"  data-toggle="dropdown" role="button">--}}
                       {{--<i class="material-icons">notifications</i>--}}
                      {{--<span class="label-count notif-alert">0</span>--}}
                  {{--</a>--}}
                  {{--<ul class="dropdown-menu">--}}
                    {{--<li class="header">NOTIFICATIONS</li>--}}
                    {{--<li class="body">--}}
                        {{--<ul class="menu">--}}
                            {{--<li>--}}
                                {{--<a href="javascript:void(0);">--}}
                                    {{--<div class="icon-circle bg-light-green">--}}
                                        {{--<i class="material-icons">person_add</i>--}}
                                    {{--</div>--}}
                                    {{--<div class="menu-info">--}}
                                        {{--<h4>12 new members joined</h4>--}}
                                        {{--<p>--}}
                                            {{--<i class="material-icons">access_time</i> 14 mins ago--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                     {{--</li>--}}
                  {{--</ul>            --}}
              {{--</li> --}}

            @if(Auth::user()->group_id == 1 or Auth::user()->group_id ==2 )
            <li class="dropdown">
                  <a href="#" data-toggle="dropdown">
                        <i class="material-icons">tune</i>   
                    </a>    
                <ul class="dropdown-menu">
                     
                    <li ><a href="{{ url('core/users')}}">  @lang('core.m_users') <br /></a> </li> 
                    <li ><a href="{{ url('core/groups')}}">  @lang('core.m_groups') </a> </li>
                    <li><a href="{{ url('core/users/blast')}}">  @lang('core.m_blastemail') </a></li> 
                    <li class="divider"></li>
                    <li><a href="{{ url('core/pages')}}">   @lang('core.m_pagecms')  </a></li>
                    <li ><a href="{{ url('core/posts')}}">  @lang('core.m_post')</a></li>
                   
                </ul>
            </li>
            @endif

            @if(Auth::user()->group_id == 1  )
            <li class="dropdown">
                  <a href="#"  data-toggle="dropdown">
                         <i class="material-icons">apps</i>
                    </a>    
                <ul class="dropdown-menu">
                  <li><a href="{{ url('') }}/sximo/config"> @lang('core.t_generalsetting') </a> </li> 
                  <li class="divider"></li>
                  <li><a href="{{ url('sximo/module')}}"> @lang('core.m_codebuilder')  </a> </li>
                  <li><a href="{{ url('sximo/rac')}}"> RestAPI Generator </a> </li> 
                  <li><a href="{{ url('sximo/tables')}}"> @lang('core.m_database') </a> </li>
                  <li><a href="{{ url('sximo/form')}}"> @lang('core.m_formbuilder') </a> </li>
                  <li><a href="{{ url('core/elfinder')}}"> Dropzone Media </a> </li>
                  <li class="divider"></li>
                  <li><a href="{{ url('sximo/menu')}}">  @lang('core.m_menu')</a> </li>              
                  <li> <a href="{{ url('sximo/code')}}"> @lang('core.m_sourceeditor') </a>  </li>
                  <li> <a href="{{ url('core/logs')}}"> @lang('core.m_logs') </a>  </li>
                  
                  <li> <a href="{{ url('sximo/config/clearlog')}}" class="clearCache"> @lang('core.m_clearcache')</a> </li>
                 


                </ul>
            </li>
            @endif

           

              
  

              {{--<li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>  --}}
          </ul>
      </div>        
  </div>
 </nav>
