
<div class="row">

@if( $user->type_id == '1' || $user->type_id == '2')

@else

<div class="col-sm-12 col-md-12 well" id="content">
<div class="col-md-2 col-md-offset-5">
<button type="button" class="btn btn-success" id="btn-tambah" name="btn-tambah" data-toggle="collapse" data-target="#demo">Tambah Materi</button> 
</div>
<div class="col-md-12">
<div id="demo" class="collapse">

<form method='post' action="" id="form-materi" name="form-materi" enctype='multipart/form-data'>
	@csrf
    <div class="form-group">
      <label for="name">Judul:</label>
      <input type="text" class="form-control" id="name" placeholder="" name="name" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" rows="5" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
      <label for="file">Pilih File (bisa lebih dari satu file) :</label>
      <input id='file' name='file[]' type='file' multiple required/>
    </div>
     <input type="hidden" id="schedule_id" name="schedule_id" value="{{$id}}">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

<div id='file-list-display'></div>
</div>
</div>
</div>

@endif

@if(count($course))

@foreach($course as $b)
<?php
$url = $b['url'];
$arr = array(".docx",".pdf",".doc",$url);
$files = glob($url.'*.{doc,docx,pdf}', GLOB_BRACE);
?>
<div class="col-sm-12 col-md-12 well" id="content">
<div class="col-sm-6">
      @if( $user->type_id == '3')
     
      <button class="btn btn-warning btn-s btn-detail fa fa-pencil-alt open-modal" value="{{$b['id']}}"></button>
      <button class="btn btn-primary btn-s btn-add fa fa-plus open-modal2" value="{{$b['id']}}"></button>
      <button class="btn btn-danger btn-s btn-delete fa fa-trash delete-task" value="{{$b['id']}}"></button>
      
      @endif
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
    <i class="fa fa-file-download fa-2x"></i> <a href='filemateri&a={{$b['id']}}' style='font-size:120%'>File Materi</a>
    </div>
    <div style='margin-bottom:20px'>
    <i class="fa fa-file-video fa-2x"></i> <a href='video&a={{$b['id']}}' style='font-size:120%'>Video Materi</a>
    </div>
    <div style='margin-bottom:20px'>
    <i class="fa fa-file-alt fa-2x"></i> <a href='tugas&a={{$b['id']}}' style='font-size:120%'>Tugas</a>
    </div>
    <div>
    <i class="fa fa-file-signature fa-2x"></i> <a href='latihan&a={{$b['id']}}' style='font-size:120%'>Latihan</a>
    </div>
    
    	<!-- <hr>
    	@foreach($files as $file)
    	<?php 
    	$name = str_replace($arr,"",$file);
    	?>
    	<h4><a href={{$file}}>{{ $name }}</a></h4></br>
    	@if( $user->type_id == '3')
    	<form method="POST" action="">
    	@csrf
    	<button name="file_id" class="btn btn-danger btn-s btn-delete fa fa-trash" value="{{$file}}"></button>
    	</form>
    	@endif
    	<hr>
    	@endforeach -->
    </div>
</div>
</div>
@endforeach
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Course</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Judul</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="judul" name="judul" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" id="desc" name="desc"></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="update">Save changes</button>
                            <input type="hidden" id="task_id" name="task_id" value="">
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Course</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="" id="" name="" class="form-horizontal" enctype='multipart/form-data'>
                            
                                <div class="form-group">
                                  <label for="file" class="col-sm-6 control-label">Pilih File (bisa lebih dari satu file) :</label>
                                  <input id='multifile' class="multifile" name='file[]' type='file' multiple/>
                                  <input type="hidden" id="task_id" name="task_id" value="">
                                </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="save-btn" value="">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @endif        
            <script src="{{asset('js/ajax-courseguru.js')}}"></script>