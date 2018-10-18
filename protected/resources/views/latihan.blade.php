
<div class="row">
@if(!count($course[0]['quiz']))
<div class="col-sm-12 col-md-12 well" id="content">
<div class="col-md-2 col-md-offset-5">
<button type="button" class="btn btn-success" id="btn-tambah" name="btn-tambah" data-toggle="collapse" data-target="#demo">Tambah Tugas</button> 
</div>
<div class="col-md-12">
<div id="demo" class="collapse">

<form method='post' action="latihanNew&a={{$course[0]->id}}" id="form-tugas" name="form-tugas" enctype='multipart/form-data'>
	@csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="" name="name" required>
    </div>
    <div class="form-group">
      <label for="description">Waktu (dalam menit):</label>
	  <input type="number" class="form-control" id="time" placeholder="" name="time" required>
    </div>
     <input type="hidden" id="materi_id" name="materi_id" value="{{$id}}">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

<div id='file-list-display'></div>
</div>
</div>
</div>

@else
@if( $user->type_id == '3')
     
     <!-- <button class="btn btn-warning btn-s btn-detail fa fa-pencil-alt" value="{{$b['id']}}"></button> -->
     <button class="btn btn-primary btn-s btn-add fa fa-plus open-modal2" value="{{$course[0]['quiz'][0]['id']}}"></button>
     <button class="btn btn-danger btn-s btn-delete fa fa-trash delete-task1" value="{{$b['id']}}"></button>
     
@endif




<!DOCTYPE html>
<html>

	<head>
		<title>Latihan</title>

		<meta charset="utf-8">

        <script type="text/javascript" src="scripts/overlay.js"></script>

     <!-- SYNTAX HIGHLIGHTER LINKS & SCRIPTS -->
        <link rel="stylesheet" type="text/css" href="sh/styles/shCore.css">
		<link rel="stylesheet" type="text/css" href="sh/styles/shThemeDefault.css">
		<script type="text/javascript" src="sh/scripts/shCore.js"></script>
	 <!-- INCLUDING ALL SCRIPTS FOR BRUSHES -->
		<script type="text/javascript" src="sh/scripts/shBrushAppleScript.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushAS3.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushBash.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushColdFusion.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushCpp.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushCSharp.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushCss.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushDelphi.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushDiff.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushErlang.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushGroovy.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushJava.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushJavaFX.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushJScript.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushPerl.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushPhp.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushPlain.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushPowerShell.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushPython.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushRuby.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushSass.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushScala.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushSql.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushVb.js"></script>
		<script type="text/javascript" src="sh/scripts/shBrushXml.js"></script>
		<script type="text/javascript">
		    SyntaxHighlighter.all()
		</script>

@if( $user->type_id == '1' || $user->type_id == '2')
        <script type="text/javascript">
	     //function that submits the quiz
			function quiz_submit(){
				window.onbeforeunload = null;
	            document.getElementById('quiz_form').submit(); 
	        }

	     //function that keeps the counter going
			function timer(secs){
				var ele = document.getElementById("countdown");
				ele.innerHTML = "Your Time Starts Now";			
				var mins_rem = parseInt(secs/60);
				var secs_rem = secs%60;
				
				if(mins_rem<10 && secs_rem>=10)
					ele.innerHTML = "Time Remaining: "+"0"+mins_rem+":"+secs_rem;
				else if(secs_rem<10 && mins_rem>=10)
					ele.innerHTML = "Time Remaining: "+mins_rem+":0"+secs_rem;
				else if(secs_rem<10 && mins_rem<10)
					ele.innerHTML = "Time Remaining: "+"0"+mins_rem+":0"+secs_rem;
				else
					ele.innerHTML = "Time Remaining: "+mins_rem+":"+secs_rem;

				if(mins_rem=="00" && secs_rem < 1){
					quiz_submit(); 
				}
				secs--;
			 //to animate the timer otherwise it'd just stay at the number entered
			 //calling timer() again after 1 sec
				var time_again = setTimeout('timer('+secs+')',1000);
			}

		 //warning confirmation that appears on closing/refreshing the quiz window/tab
			function closeEditorWarning(){
    				return "really wanna quit!? You can't take the test again you know!";
			}
			window.onbeforeunload = closeEditorWarning;
        </script>
@endif
        <script language="javascript">
			document.addEventListener("contextmenu", function(e){
			    e.preventDefault();
			}, false);
		</script>
		
	</head>

	<body style="font-family: Arial;">

		<div id="head" align="center">
            <img src="" alt="" />
        </div>

        <br><strong> {{$course[0]['quiz'][0]['name']}} </strong>
@if( $user->type_id == '3')

@else
        <div id="countdown">
        	<script type="text/javascript">
        		timer({{$course[0]['quiz'][0]['time']*60}});
        	</script>
        </div>
@endif

		<div id="main_body" align="center" style="margin-bottom: 100px;">
			<br/><br/><br/>
		<table width="780px" align="center">
        <?php $i = 0; ?>
@foreach($course[0]['quiz'][0]['question'] as $quiz)
@if( $user->type_id == '3')
		<tr>
		<td>
		</td>
		<td>
		<button class="btn btn-warning btn-s btn-detail fa fa-pencil-alt open-modal" value="{{$quiz['id']}}"></button>
		<button class="btn btn-danger btn-s btn-delete fa fa-trash delete-task" value="{{$quiz['id']}}"></button>
		</td>
		</tr>
@endif
<form id="quiz_form" name="quiz_form_name" action="" method="POST">
        @csrf
        <tr>
        <td width="40px" rowspan="1" align="center">
            <strong> {{$i+1}} </strong>
        </td>
        <td>
            <pre class="question_style"><strong><div style="width: 730px; word-wrap: break-word;"> {{$quiz->question}} </div></strong></pre>
        </td>
		</tr>
		<?php $q = 1;?>
        @foreach($quiz->answer as $answer)
        <tr>
        <td></td>
        <td>
            <label style="cursor:pointer;">
                    <input type="radio" name="rads{{$i+1}}" value="{{$answer->id}}" required> {{$answer->answer}} </label>
            <br/><br/>
        </td>
		</tr>
		<?php $q++;?>
        @endforeach
        <tr height="20px">
        </tr>
        <?php $i++;?>
		@endforeach 
        <tr>
		<td colspan="2" align="center">
                    <input type="hidden" name="total_ques" value="{{$i}}">
					<input type="hidden" name="total_time" value="{{$course[0]['quiz'][0]['time']*60}}">
					<input type="hidden" name="quizID" value="{{$course[0]['quiz'][0]['id']}}">
			<span id="m_btnSpan">
			@if($user->type_id == '1' || $user->type_id == '2')
					<a href="javascript:{}" onclick="quiz_submit()" class="btn btn-info">Submit</a>
			@endif
			</span>
		</td>
		</tr>
		</table>
			</form>
		</div>

        <div id="fade_overlay">
            <a href="javascript:close_overlay();" style="cursor: default;">
                <div id="fade" class="black_overlay">
                </div>
            </a>
        </div>


	</body>
</html>
@endif
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Latihan</h4>
                        </div>
						<div class="modal-body">
						<form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">
						<div class="form-group">
                                    <label for="desc" class="col-sm-3 control-label">Pertanyaan</label>
                                    <div class="col-sm-9">
									<textarea class="txt_area" id="quest" name="quest"></textarea>
                                    </div>
                        </div>

						<div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Pilihan A</label>
                                    <div class="col-sm-9">
									<input type="text" class="mc_txt_box" id="answer1" name="answer1">&nbsp;
									<label style="cursor:pointer; color:#555;">
										  <input type="radio" id="iscorrect" name="iscorrect" value="answer1">Correct Answer?
									</label>
                                    </div>
                        </div>

						<div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Pilihan B</label>
                                    <div class="col-sm-9">
									<input type="text" class="mc_txt_box" id="answer2" name="answer2">&nbsp;
									<label style="cursor:pointer; color:#555;">
										  <input type="radio" id="iscorrect" name="iscorrect" value="answer2">Correct Answer?
									</label>
                                    </div>
                        </div>

						<div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Pilihan C</label>
                                    <div class="col-sm-9">
									<input type="text" class="mc_txt_box" id="answer3" name="answer3">&nbsp;
									<label style="cursor:pointer; color:#555;">
										  <input type="radio" id="iscorrect" name="iscorrect" value="answer3">Correct Answer?
									</label>
                                    </div>
                        </div>

						<div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Pilihan D</label>
                                    <div class="col-sm-9">
									<input type="text" class="mc_txt_box" id="answer4" name="answer4">&nbsp;
									<label style="cursor:pointer; color:#555;">
										  <input type="radio" id="iscorrect" name="iscorrect" value="answer4">Correct Answer?
									</label>
                                    </div>
                        </div>
                        </div>
						<div class="modal-footer">
						<input type="hidden" id="task_id" name="task_id" value="">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
							</form>
                        </div>
                    </div>
                </div>
            </div>

			<script src="{{asset('js/ajax-latihanguru.js')}}"></script>