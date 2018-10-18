<article class="module width_full">
	<header><h3>DATA GURU</h3></header>
		<div class="module_content">

		<button id="btn-add" name="btn-add" class="btn btn-primary btn-s" style="margin-bottom: 20px">Tambah Data Guru</button>
		
		<table id="myTable" class='table table-striped' style='background-color:white'>
		<thead>
		<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>NIP</th>
		<th>ALAMAT</th>
		<th>TEMPAT LAHIR</th>
		<th>TANGGAL LAHIR</th>
		<th>AGAMA</th>
		<th>JENIS KELAMIN</th>
		<th>NO. TELP</th>
        <th>User E-Learning</th>
		<th>CONTROL</th>
		<thead>
		</tr>
		

		@if ($count == '0')
			
			{!!html_entity_decode('<tr>
				<td colspan="13" style="text-align:center;">-- Tidak Ada Data --</td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
				<td style="display: none;"></td>
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
			@foreach($guru as $index => $task)
				<tr id="row{{$task->id}}">
				<td>{{$index+1}}</td>
				<td>{{$task->fullname}}</td>
				<td>{{$task->nip}}</td>
				<td>{{$task->address}}</td>
				<td>{{$task->birth_place}}</td>
				<td>{{$task->birth_date}}</td>
				<td>{{$task->religion->name}}</td>
				<td>{{$task->sex->name}}</td>
				<td>{{$task->phone_number}}</td>
                <td>
                    @if($task->user_id != null)
                    <button class="btn btn-warning btn-s open-modal-user fa fa-pencil-alt" value="{{$task->id}}"></button>
                    <button class="btn btn-danger btn-s btn-delete fa fa-trash delete-user" value="{{$task->id}}"></button>
                    @else
                    <button id="btn-add-user" class="btn btn-primary btn-s fa fa-plus" value="{{$task->id}}"></button>
                    @endif
                </td>
				<td>
					<button class="btn btn-warning btn-s btn-detail fa fa-pencil-alt open-modal" value="{{$task->id}}"></button>
                    <button class="btn btn-danger btn-s btn-delete fa fa-trash delete-task" value="{{$task->id}}"></button>
				</td>
				</tr>

			@endforeach
			<tbody>
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
                            <h4 class="modal-title" id="myModalLabel">Guru</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nip" name="nip" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tempat" name="tempat" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tgl" name="tgl" value="">
                                    </div>
                                </div>

								<div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select id="agama" name="agama" class="form-control">
                                        	<!-- <option value="" selected="selected">PILIH JURUSAN</option> -->
									        @foreach($agama as $agm)
									         <option value="{{ $agm->id}}">{{ $agm->name}}</option>
									        @endforeach
									    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select id="jk" name="jk" class="form-control">
                                        	<!-- <option value="" selected="selected">PILIH JURUSAN</option> -->
									        @foreach($jk as $jnsklmn)
									         <option value="{{ $jnsklmn->id}}">{{ $jnsklmn->name}}</option>
									        @endforeach
									    </select>
                                    </div>
                                </div>

                                	


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">No. Telp</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="telp" name="telp" value="">
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

            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">User E-Learning</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks2" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="username" name="username" value="" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="password" name="password" value="" required="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save-user" value="update">Save changes</button>
                            <input type="hidden" id="task_id" name="task_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{asset('js/ajax-guru.js')}}"></script>