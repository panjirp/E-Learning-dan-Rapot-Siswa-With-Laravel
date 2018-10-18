
<article class="module width_full">
	<header><h3>DATA KELAS {{ $judul }}</h3></header>
		<div class="module_content">

		<button id="btn-add" name="btn-add" class="btn btn-primary btn-s" style="margin-bottom: 20px">Tambah Data Kelas</button>
						
		<table id="myTable" class='table table-striped' style='background-color:white'>
		<thead>
		<tr>
		<th>NO</th>
		<th>KELAS</th>
		@if($jurusan[0]->id != 3)
		<th>JURUSAN</th>
		@endif
		<th>CONTROL</th>
		</tr>
		</thead>
		

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
			
			@foreach($tingkat as $index => $task)
			
				<tr id="row{{$task->id}}">
				<td>{{$index+1}}</td>
				<td id="task{{$task->id}}">{{$task->name}}</td>
				@if($jurusan[0]->id != 3)
				<td id="task2{{$task->id}}">{{$task->vocational->name}}</td>
				@endif
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
                            <h4 class="modal-title" id="myModalLabel">Kelas</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Kelas" value="">
                                    </div>
                                    @if($jurusan[0]->id != 3)
                                    <label for="inputEmail3" class="col-sm-3 control-label">Jurusan</label>
                                    <div class="col-sm-9">
                                        <select id="jrsn" name="jrsn" class="form-control">
                                        	<!-- <option value="" selected="selected">PILIH JURUSAN</option> -->
									        @foreach($jurusan as $jrsn)
									         <option value="{{ $jrsn->id}}">{{ $jrsn->name}}</option>
									        @endforeach
									    </select>
                                    </div>
                                    @else
                                    <input type="hidden" id="jrsn" name="jrsn" value="3">
                                    @endif
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
            <script src="{{asset('js/ajax-kelas.js')}}"></script>