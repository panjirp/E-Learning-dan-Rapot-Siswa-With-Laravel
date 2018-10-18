
<div class="row">

@if(count($course))

@foreach($course as $b)
<?php
$url = $b['url'];
$arr = array(".docx",".pdf",".doc",$url);
$files = glob($url.'*.{doc,docx,pdf}', GLOB_BRACE);
?>
<div class="col-sm-12 col-md-12 well" id="content">
<div class="col-sm-6">
      
  </div>

  <div class="col-sm-12">
    <h1><b>{{ $b['name'] }}</b></h1>
    <h4>{{ $b['description'] }}</h4>
    </div>

<div class="col-sm-2 col-md-offset-5">
 <button style="width:80%" type="button" class="btn btn-info fa fa-chevron-down" data-toggle="collapse" data-target="#demo{{$b['id']}}"></button> 
</div>

<div class="col-sm-12">
    <div id="demo{{$b['id']}}" class="collapse">
    
    <div style='margin-bottom:20px'>
    <i class="fa fa-file-download fa-2x"></i> <a href='filemateriadmin&a={{$b['id']}}' style='font-size:120%'>File Materi</a>
    </div>
    <div style='margin-bottom:20px'>
    <i class="fa fa-file-video fa-2x"></i> <a href='videoadmin&a={{$b['id']}}' style='font-size:120%'>Video Materi</a>
    </div>
    <div style='margin-bottom:20px'>
    <i class="fa fa-file-alt fa-2x"></i> <a href='tugasadmin&a={{$b['id']}}' style='font-size:120%'>Tugas</a>
    </div>
    <div>
    <i class="fa fa-file-signature fa-2x"></i> <a href='latihanadmin&a={{$b['id']}}' style='font-size:120%'>Latihan</a>
    </div>
    
    </div>
</div>
</div>
@endforeach
@endif
</div>
