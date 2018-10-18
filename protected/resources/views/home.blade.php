
<html>

<head>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<link href="{{asset('css/styles.css')}}" rel="stylesheet">
<link href="fontawesome/css/all.css" rel="stylesheet">
<script src="{{asset('js/siak.js')}}"></script>

 <title>E-Learning SMP & SMK Nurul Iman</title>
</head>

<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
   <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">E-Learning SMP & SMK Nurul Iman</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ $student[0]->fullname }} <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <!-- <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li> -->
                    <li><a href="changepass"><i class="fa fa-fw fa-cog"></i> Ganti Password</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick='logout()'><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
       
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                             <a href="home"><i class="fa fa-fw fa-home"></i> HOME </i></a>
                        </li>
                        <li>
                            <a href="profil"><i class="fa fa-fw fa-user"></i>  PROFIL </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-book fa-fw"></i> MATERI <span class="fa fa-fw fa-angle-down pull-right"></span></a>
                            <ul id="submenu-2" class="nav collapse nav-second-level">
                               
                                            
                                            @if( $user->type_id == '1' || $user->type_id == '2')        
                                            @foreach($schedule as $a)                
                                                {!!html_entity_decode('<li><a href="course&a='.$a->id.'"><i class="fa fa-angle-double-right"></i> '.$a->subject->name.'</a></li>')!!}
                                            @endforeach
                                            @else

                                            @foreach($kelas as $b)
                                            
                                            <li>
                                                <a href="#" data-toggle="collapse" data-target="#submenu-{{$b->kelas['id']}}"><i class="fa fa-angle-double-right"></i> {{$b->kelas['name']}} <span class="fa fa-fw fa-angle-down pull-right"></span></a>
                                                <ul id="submenu-{{$b->kelas['id']}}" class="nav collapse nav-third-level"> 
                                                    @foreach($schedule as $a)
                                                        @if($a->kelas['id'] == $b->kelas['id'])                                                                                                                  
                                                                <li><a href="course&a={{$a->id}}"><i class="fa fa-angle-double-right"></i> {{$a->subject['name']}}</a></li>                                                            
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            
                                        @endforeach 
                                        @endif
                                            
                            </ul>
                        </li>              
                        <li>
                            @if( $user->type_id == '1' || $user->type_id == '2')
                            <a href="#" data-toggle="collapse" data-target="#submenu-7"><i class="fa fa-fw fa-bar-chart"></i> RAPOT  <span class="fa fa-fw fa-angle-down pull-right"></span></a>
                            <ul id="submenu-7" class="nav collapse nav-second-level">
                            @foreach($kelas as $kls)
                            <li><a href="#" data-toggle="collapse" data-target="#submenu-7{{$kls->id}}"><i class="fa fa-angle-double-right"></i> {{$kls->kelas_name}} <span class="fa fa-fw fa-angle-down pull-right"></span></a></li> 
                            <ul id="submenu-7{{$kls->id}}" class="nav collapse nav-third-level">
                            <li><a href="reportsiswa&a={{$kls->kelas_name}}&b=1"><i class="fa fa-angle-double-right"></i> Semester 1</a></li> 
                            <li><a href="reportsiswa&a={{$kls->kelas_name}}&b=2"><i class="fa fa-angle-double-right"></i> Semester 2</a></li>     
                            </ul> 
                            @endforeach
                            </ul>
                            @else
                            <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-bar-chart fa-fw"></i> RAPOT <span class="fa fa-fw fa-angle-down pull-right"></span></a>
                            <ul id="submenu-3" class="nav collapse nav-second-level">
                            @if($walikelas != null)
                            <li>
                              <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-angle-double-right"></i> Wali Kelas <span class="fa fa-fw fa-angle-down pull-right"></span></a>
                              <ul id="submenu-4" class="nav collapse nav-third-level"> 
                              @foreach($walikelas as $wali)
                              <li><a href="#" data-toggle="collapse" data-target="#submenu-11{{$wali->id}}"><i class="fa fa-angle-double-right"></i> {{$wali->name}}<span class="fa fa-fw fa-angle-down pull-right"></span></a>
                              <ul id="submenu-11{{$wali->id}}" class="nav collapse nav-forth-level">
                              <li><a href="reportwali&a={{$wali->id}}&b=1"><i class="fa fa-angle-double-right"></i> Semester 1</a></li> 
                              <li><a href="reportwali&a={{$wali->id}}&b=2"><i class="fa fa-angle-double-right"></i> Semester 2</a></li>     
                              </ul>
                              </li>
                              @endforeach
                              </ul>
                                            </li>
                              @endif
                             @foreach($kelas as $c)
                                            <li>
                                                <a href="#" data-toggle="collapse" data-target="#submenu-1{{$c->kelas['id']}}"><i class="fa fa-angle-double-right"></i> {{$c->kelas['name']}} <span class="fa fa-fw fa-angle-down pull-right"></span></a>
                                                <ul id="submenu-1{{$c->kelas['id']}}" class="nav collapse nav-third-level"> 
                                                    @foreach($schedule as $d)
                                                        @if($d->kelas['id'] == $c->kelas['id'])                                                                                                                  
                                                                <li
                                                                ><a href="#" data-toggle="collapse" data-target="#submenu-10{{$d->kelas['id']}}{{$d->subject['id']}}"><i class="fa fa-angle-double-right"></i> {{$d->subject['name']}}<span class="fa fa-fw fa-angle-down pull-right"></span></a>      
                                                                <ul id="submenu-10{{$d->kelas['id']}}{{$d->subject['id']}}" class="nav collapse nav-forth-level">
                                                                <li><a href="report&a={{$d->id}}&b=1"><i class="fa fa-angle-double-right"></i> Semester 1</a></li> 
                                                                <li><a href="report&a={{$d->id}}&b=2"><i class="fa fa-angle-double-right"></i> Semester 2</a></li>     
                                                                </ul>  
                                                                </li>                                                    
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            
                                        @endforeach 
                            @endif
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <!-- <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content"> -->
                    
                    @include($ambil)

                <!-- </div>
            </div> -->
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<script type="text/javascript">
    function logout(){
        if (confirm('Anda Yakin Ingin Keluar dari E-Learning?')) {
    window.location.href = "{{URL::to('/getLogout')}}";
} else {
    // window.location.href = 'index.php'
}
    }
</script>

<meta name="_token" content="{!! csrf_token() !!}" />


</body>
</html>