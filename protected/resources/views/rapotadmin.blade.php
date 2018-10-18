<article class="module width_full">
	<header><h3>RAPOT SISWA</h3></header>
		<div class="module_content">
		
		<table id="myTable" class='table table-striped' style='background-color:white'>
		<thead>
		<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>NIS</th>
        <th>NISN</th>
		<th>CONTROL</th>
		<thead>
		</tr>
		

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
			@foreach($student as $index => $task)
				<tr id="row{{$task->id}}">
				<td>{{$index+1}}</td>
				<td>{{$task->fullname}}</td>
				<td>{{$task->nis}}</td>
                <td>{{$task->nisn}}</td>
				<td>
					<a href='detailrapot&a={{$task->id}}' class="btn btn-success btn-s btn-detail fa fa-external-link-alt open-modal"></a>
				</td>
				</tr>

			@endforeach
			<tbody>
		@endif

			</table>

		</div>
</article>
