<div style="width:100%;">
 	
<div style="width:30%;float:left;">
	<div><img src="{{ $student[0]->picture }}" /></div>
</div>


<div style="width:50%;float:left;">
<table class="table table-striped">
<tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{ $student[0]->fullname }}</td>
</tr>
<tr>
        <td>
		
		@if( $user->type_id == '1' || $user->type_id == '2')
                <?php $ni = $student[0]->nis; ?>
			
			{{ 'NIS' }}
		@else
                <?php $ni = $student[0]->nip; ?>
			
			{{ 'NIP' }}
		@endif
		
        </td>
        <td>:</td>
        <td>{{ $ni }}</td>
</tr>
<tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $student[0]->address }}</td>
</tr>
<tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $student[0]->birth_place }} {{ '/' }} {{ $student[0]->birth_date }}</td>
</tr>

		@if( $user->type_id == '1' || $user->type_id == '2')
			{!!html_entity_decode('<tr>
        <td>Jurusan</td>
        <td>:</td>
        <td>'.$jurusan[0]->kelas->vocational->name.'</td>
</tr>
<tr>
        <td>Kelas</td>
        <td>:</td>
        <td>'.$jurusan[0]->kelas->name.'</td>
</tr>')!!}
@endif


			

</table>
</div>

</div>