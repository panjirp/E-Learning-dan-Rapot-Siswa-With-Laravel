<article class="module width_full">
	<header><h3>DATA MATERI</h3></header>

		<div class="module_content">		
		<!-- <div id="err" class="alert alert-danger err">
        <center>{{ session('message') }}</center>
    </div> -->
	<button id="btn-add" name="btn-add" class="btn btn-primary btn-s" style="margin-bottom: 20px">Tambah Data Materi</button>

		<table id="myTable" class='table table-striped' style='background-color:white'>
		<thead>
		<tr>
		<th>NO</th>
		<th>Nama Guru</th>
		<th>Mata Pelajaran</th>
		<th>Kelas</th>
		<th>CONTROL</th>
		</tr>
		</thead>
		@if ($count == '0')
			
			{!!html_entity_decode('<tr>
				<td colspan="5" style="text-align:center;">-- Tidak Ada Data --</td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
			</tr>')!!}
 
		@else
			<tbody id="tasks-list" name="tasks-list">
			@foreach($course as $index => $task)
				<tr id="row{{$task->id}}">
				<td>{{$index+1}}</td>
				<td>{{$task->teacher['fullname']}}</td>
				<td>{{$task->subject['name']}}</td>
				<td>{{$task->kelas['name']}}</td>
				<td>
					<button class="btn btn-warning btn-s btn-detail open-modal fa fa-pencil-alt" value="{{$task->id}}"></button>
                    <button class="btn btn-danger btn-s btn-delete delete-task fa fa-trash" value="{{$task->id}}"></button>
				</td>
				</tr>

			@endforeach
		@endif
		</tbody>
			</table>

		</div>
</article>


<!-- Modal (Pop up when detail button clicked) -->
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
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama Guru</label>
                                    <div class="col-sm-9">
                                        <select id="fullname" name="fullname" class="form-control">
                                        	<!-- <option value="" selected="selected">PILIH JURUSAN</option> -->
									        @foreach($teacher as $tch)
									         <option value="{{ $tch->id}}">{{ $tch->fullname}}</option>
									        @endforeach
									    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Mata Pelajaran</label>
                                    <div class="col-sm-9">
                                        <select id="matpel" name="matpel" class="form-control">
                                        	<!-- <option value="" selected="selected">PILIH JURUSAN</option> -->
									        @foreach($matpel as $mtp)
									         <option value="{{ $mtp->id}}">{{ $mtp->name}}</option>
									        @endforeach
									    </select>
                                    </div>
                                </div>

				
                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kelas</label>
                                    <div class="col-sm-9">
                                        <select id="kelas" name="kelas" class="form-control">
                                        	<!-- <option value="" selected="selected">PILIH JURUSAN</option> -->
									        @foreach($kelas as $kls)
									         <option value="{{ $kls->id}}">{{ $kls->name}}</option>
									        @endforeach
									    </select>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="update">Save changes</button>
                            <input type="hidden" id="task_id" name="task_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{asset('js/ajax-course.js')}}"></script>