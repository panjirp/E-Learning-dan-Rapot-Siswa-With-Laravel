<article class="module width_full">
	<header><h3>RAPOT SISWA</h3></header>
		<div class="module_content">
		
<ul>
@foreach($kelas as $kls)
<li>{{$kls->kelas_name}}</li>
<ul>
<li><a href="detailrapotsiswa&a={{$kls->kelas_name}}&b=1&c={{$student[0]->id}}">Semester 1</a></li>
<li><a href="detailrapotsiswa&a={{$kls->kelas_name}}&b=2&c={{$student[0]->id}}">Semester 2</li>
</ul>
@endforeach
</ul>
