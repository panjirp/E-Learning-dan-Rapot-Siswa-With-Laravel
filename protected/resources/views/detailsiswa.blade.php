<article class="module width_full">
	<header><h3>DATA DETAIL SISWA</h3></header>
		<div class="module_content">

<div style="width:100%; margin-top: 20px;">
 	
<div style="width:30%;float:left;margin-top:80px;">
	<div><img src="{{$siswa[0]->picture}}" class="center"/></div>
    <div class="form-group">
    <form action="changepict/{{$siswa[0]->id}}" method="post" enctype="multipart/form-data">
      <label for="file">Ganti Foto :</label>
      @csrf
      <input id='file' name='file' type='file'/>
      <input type="submit" class="btn btn-success" value="Upload Image" name="submit">
      </form>
    </div>
</div>


<div style="width:50%;float:left;">
<button class="btn btn-warning btn-s open-modal fa fa-pencil-alt" value="{{$siswa[0]->id}}"></button>
<table class="table table-striped">
<tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{ $siswa[0]->fullname }}</td>
</tr>
<tr>
        <td>			
			{{ 'NIS' }}
        </td>
        <td>:</td>
        <td>{{ $siswa[0]->nis }}</td>
</tr>
<tr>
        <td>			
			{{ 'NISN' }}
        </td>
        <td>:</td>
        <td>{{ $siswa[0]->nisn }}</td>
</tr>
<tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $siswa[0]->address }}</td>
</tr>
<tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $siswa[0]->birth_place }} {{ '/' }} {{ $siswa[0]->birth_date }}</td>
</tr>
<tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $siswa[0]->religion->name }}</td>
</tr>
<tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $siswa[0]->sex->name }}</td>
</tr>
<tr>
        <td>No. Telp</td>
        <td>:</td>
        <td>{{ $siswa[0]->phone_number }}</td>
</tr>
<tr>
        <td>Kelas</td>
        <td>:</td>
        <td>{{ $siswa[0]->kelas->name }}</td>
</tr>
<tr>
        <td>Jurusan</td>
        <td>:</td>
        <td>{{ $siswa[0]->kelas->vocational->name }}</td>
</tr>
<tr>
        <td>Tahun Masuk</td>
        <td>:</td>
        <td>{{ $siswa[0]->entry_year }}</td>
</tr>
<tr>
        <td>Status</td>
        <td>:</td>
        <td>{{ $siswa[0]->status->name }}</td>
</tr>

			

</table>

</div>

</div>

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
                                    <label for="inputEmail3" class="col-sm-3 control-label">NIS</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nis" name="nis" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">NISN</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nisn" name="nisn" value="">
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

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Tahun Masuk</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tm" name="tm" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <select id="status" name="status" class="form-control">
                                        	<!-- <option value="" selected="selected">PILIH JURUSAN</option> -->
									        @foreach($status as $stts)
									         <option value="{{ $stts->id}}">{{ $stts->name}}</option>
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
            <script src="{{asset('js/ajax-siswa.js')}}"></script>