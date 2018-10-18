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
		<th>Kebersihan</th>
        <th>Kerapihan</th>
        <th>Ibadah</th>
        <th>Kesantunan</th>
        <th>Sakit</th>
        <th>Ijin</th>
        <th>Tanpa Keterangan</th>
        <th>Membolos</th>
        <th>Tuntas</th>
        <th>Naik</th>
        <th>Catatan</th>
		<th>CONTROL</th>
		</tr>
		</thead>

		@if ($count == '0')
			
			{!!html_entity_decode('<tr>
				<td colspan="12" style="text-align:center;">-- Tidak Ada Data --</td>
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
				<td>{{$tasks->kebersihan}}</td>
                <td>{{$tasks->kerapihan}}</td>
                <td>{{$tasks->ibadah}}</td>
				<td>{{$tasks->kesantunan}}</td>
                <td>{{$tasks->sakit}}</td>
                <td>{{$tasks->ijin}}</td>
				<td>{{$tasks->tanpa_keterangan}}</td>
                <td>{{$tasks->membolos}}</td>
                <td>@if($tasks->tuntas==1)
                Tuntas
                @elseif($tasks->tuntas==0)
                Tidak Tuntas
                @else
                @endif</td>
                <td>@if($tasks->lulus==1)
                Naik
                @elseif($tasks->lulus==0)
                Tidak Naik
                @else
                @endif</td>
                <td>{{$tasks->catatan_tambahan}}</td>
				<td>
                    <input type="hidden" id="task_id2" name="task_id2" value="{{$tasks->id}}">
					<button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$tasks->id_student}}">Edit</button>
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
                                    <label for="inputEmail3" class="col-sm-3 control-label">Kebersihan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kebersihan" name="kebersihan" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Kerapihan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kerapihan" name="kerapihan" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Ibadah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ibadah" name="ibadah" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Kesantunan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kesantunan" name="kesantunan" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Sakit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="sakit" name="sakit" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Ijin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ijin" name="ijin" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Tanpa Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tk" name="tk" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Membolos</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="membolos" name="membolos" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Tuntas</label>
                                    <div class="col-sm-9">
                                    <label for="tuntas">Tuntas</label>
                                    <input type="radio" name="tuntas" id="tuntas" value="1"><br>
                                    <label for="tidaktuntas">Tidak</label>
                                    <input type="radio" name="tuntas" id="tidaktuntas" value="0">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Naik</label>
                                    <div class="col-sm-9">
                                    <label for="lulus">Naik</label>
                                    <input type="radio" name="lulus" id="lulus" value="1"><br>
                                    <label for="tidaklulus">Tidak</label>
                                    <input type="radio" name="lulus" id="tidaklulus" value="0">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Catatan Tambahan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="catatan_tambahan" name="catatan_tambahan" value="">
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="update">Save changes</button>
                            <input type="hidden" id="semester" name="semester" value="{{$smt}}">
                            <input type="hidden" id="teacher_id" name="teacher_id" value="{{$student[0]->id}}">
                            <input type="hidden" id="kelas" name="kelas" value="{{$walikelas[0]->name}}">
                            <input type="hidden" id="task_id" name="task_id" value="0">
                            <input type="hidden" id="task_id2" name="task_id2" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{asset('js/ajax-reportwali.js')}}"></script>