
<html>

<head>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/dataTables.min.js')}}"></script>
<link href="{{asset('css/styles.css')}}" rel="stylesheet">
<link href="{{asset('css/dataTables.min.css')}}" rel="stylesheet">
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Admin <b class="fa fa-angle-down"></b></a>
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
                    <ul class="nav side-nav" id="side-menu">
                        <li>
                             <a href="admin"><i class="fa fa-fw fa-home"></i> HOME </i></a>
                        </li>
                        <li >
                            <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-wrench fa-fw"></i> DATA KELAS <span class="fa fa-fw fa-angle-down pull-right"></span></a>
                            <ul id="submenu-2" class="nav collapse nav-second-level">
                                <li><a href="class&j=smp"><i class="fa fa-angle-double-right"></i> SMP</a></li>
                                <li><a href="class&j=smk"><i class="fa fa-angle-double-right"></i> SMK</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="jurusan"><i class="fa fa-fw fa-wrench"></i> DATA JURUSAN SMK </a>
                        </li>
                        <li>
                            <a href="guru"><i class="fa fa-fw fa-wrench"></i> DATA GURU </a>
                        </li>
                        <li>
                            <a href="siswa&id=3"><i class="fa fa-fw fa-wrench"></i> DATA SISWA SMP </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-wrench fa-fw"></i> DATA SISWA SMK <span class="fa fa-fw fa-angle-down pull-right"></span></a>
                            <ul id="submenu-3" class="nav collapse nav-second-level">

                                @foreach($muridsmk as $msmk)
                                    {!!html_entity_decode('<li><a href="siswa&id='.$msmk['id'].'"><i class="fa fa-angle-double-right"></i> '.$msmk['name'].'</a></li>')!!}
                                @endforeach   
                            </ul>
                        </li>
                        <li>
                            <a href="matpel"><i class="fa fa-fw fa-wrench"></i> DATA MATA PELAJARAN </a>
                        </li>
                        <li>
                            <a href="courseadmin"><i class="fa fa-fw fa-wrench"></i> MATERI </a>
                        </li>
                        <li>
                            <a href="elearning"><i class="fa fa-fw fa-wrench"></i> E-LEARNING </a>
                        </li>
                        <li>
                            <a href="rapotadmin"><i class="fa fa-fw fa-wrench"></i> RAPOT SISWA </a>
                        </li>              
                        <!-- <li>
                            <a href=""><i class="fa fa-fw fa-bar-chart"></i> RAPOT </a>
                        </li> -->
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
    
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>    

</body>
</html>