<article class="module width_full">
	<header><h3>REPORT SISWA</h3></header>
		<div class="module_content">
		
		<table id="myTable" class='table table-striped' style='background-color:white'>
		<thead>
		<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>NIS</th>
        <th>NISN</th>
        <th>KKM Nilai Ujian</th>
		<th>Nilai Ujian</th>
        <th>KKM Nilai Sekolah</th>
        <th>Nilai Sekolah</th>
        <th>Attitude</th>
		<th>CONTROL</th>
		</tr>
		</thead>

		@if ($count == '0')
			
			{!!html_entity_decode('<tr>
				<td colspan="7" style="text-align:center;">-- Tidak Ada Data --</td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
                <td style="display: none;"></td>
                <td style="display: none;"></td>
			</tr>')!!}
 
		@else
			
			<tbody id="tasks-list" name="tasks-list">
				@foreach($report as $index =>$tasks)
				<tr id="row{{$tasks->id}}">
				<td>{{$index+1}}</td>
				<td>{{$tasks->fullname}}</td>
				<td>{{$tasks->nis}}</td>
                <td>{{$tasks->nisn}}</td>
                <td>{{$tasks->kkm_nu}}</td>
                <td>{{$tasks->nilai_ujian}}</td>
                <td>{{$tasks->kkm_ns}}</td>
                <td><?php if($tasks->nilai_ujian != null){
                    $ns = round(((50)+(($tasks->nilai_ujian-10)*(45/80))));
                }else{
                    $ns = 0;
                }
                ?>
                {{$ns}}
                </td>
                <td>{{$tasks->attitude}}</td>
				<td>
                    <input type="hidden" id="task_id2" name="task_id2" value="{{$tasks->idschedule}}">
					<button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$tasks->idstudent}}">Edit</button>
                    <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$tasks->id_nilai}}">Delete</button>
				</td>
				</tr>
				@endforeach
			</tbody>
		@endif
			</table>
		

		</div>
</article>

<!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">REPORT SISWA</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">NIS</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nis" name="nis" value="" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">NISN</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nisn" name="nisn" value="" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">KKM Nilai Ujian</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kkm_nu" name="kkm_nu" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nilai Ujian</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nu" name="nu" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">KKM Nilai Sekolah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kkm_ns" name="kkm_ns" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Attitude</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="attitude" name="attitude" value="">
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="update">Save changes</button>
                            <input type="hidden" id="semester" name="semester" value="{{$smt}}">
                            <input type="hidden" id="subject" name="subject" value="{{$report[0]->subject}}">
                            <input type="hidden" id="subjecttype_id" name="subjecttype_id" value="{{$report[0]->subjecttype_id}}">
                            <input type="hidden" id="teacher_id" name="teacher_id" value="{{$report[0]->teacher_id}}">
                            <input type="hidden" id="kelas" name="kelas" value="{{$report[0]->name}}">
                            <input type="hidden" id="task_id" name="task_id" value="0">
                            <input type="hidden" id="task_id2" name="task_id2" value="{{$report[0]->id}}">
                            <input type="hidden" id="task_id3" name="task_id3" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{asset('js/ajax-report.js')}}"></script>