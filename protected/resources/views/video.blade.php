
<div class="row">

@if(count($course))

@foreach($course as $b)
<div class="col-sm-12 col-md-12 well" id="content">
<div class="col-sm-6">
      @if( $user->type_id == '3')
      <button class="btn btn-primary btn-s btn-add fa fa-plus open-modal2" value="{{$b['id']}}"></button>   
      @endif
  </div>

  <div class="col-sm-12">
    <h1><b>{{ $b['name'] }}</b></h1>
    <h4>{{ $b['description'] }}</h4>
    </div>

@foreach($b->video as $video)
@if($video['video'] != null)
<?php
$url = $video['video'];
$yutub = 'https://www.youtube.com/watch?v=';
$namepath = str_replace($yutub,"",$url);
?>
<div class="col-sm-12 col-md-12">
<div class="col-sm-10">
<center>    
<iframe width="550" height="315"
src="https://www.youtube.com/embed/{{$namepath}}">
</iframe> 
</center>
<hr>
</div>
<div class="col-sm-2">

    	@if( $user->type_id == '3')
        <button class="btn btn-warning btn-s btn-detail fa fa-pencil-alt open-modal" value="{{$video['id']}}"></button>
    	<button class="btn btn-danger btn-s btn-delete fa fa-trash delete-task" value="{{$video['id']}}"></button>
    	@endif
        </div>
        </div>
@endif
@endforeach
@endforeach
</div>

            <div class="modal fade" id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Video Materi</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="" id="" name="" class="form-horizontal">
                            
                            <div class="form-group">
                                    <label for="yutub" class="col-sm-3 control-label">URL YouTube</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="yutub" name="yutub" value="" required>
                                        <input type="hidden" id="task_id" name="task_id" value="">
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="save-btn" value="">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @endif        
            <script src="{{asset('js/ajax-video.js')}}"></script>