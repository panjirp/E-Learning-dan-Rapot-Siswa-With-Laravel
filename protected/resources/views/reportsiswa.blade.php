<article class="module width_full" style="margin-top: 10px">

</head>
<body>

<?php 
$f = new NumberFormatter("id", NumberFormatter::SPELLOUT);
$i = 0;
?>
@if(count($nilai))
<button id="btn-add" name="btn-add" class="btn btn-info" style="margin-bottom: 20px" onclick="myFunction('printable')">Print</button>
<button id="btnExport" class="btn btn-success" style="margin-bottom: 20px" onclick="fnExcelReport();"> Export </button>
<div id='printable'>
<style>
.test {
   border-collapse: collapse;
   width: 80%;
   margin-bottom: 40px;
}

.test td{
	border: 1px solid black;
}

.test2 {
	width:80%;
}

.test2 th{
	text-align: center;
}
</style>
<table class='test2'>
<tr>
	<th colspan="6">LAPORAN PERKEMBANGAN</th>
</tr>
<tr>
	<th colspan="6">HASIL PELAJARAN DAN PENGEMBANGAN DIRI</th>
</tr>
<tr>
	<th colspan="6">PESERTA DIDIK</th>
</tr>
<tr>
	<td>Nama Siswa</td>
	<td>:</td>
	<td>{{$student[0]->fullname}}</td>
	<td>NIS</td>
	<td>:</td>
	<td>{{$student[0]->nis}}</td>
</tr>
<tr>
	<td>Kelas</td>
	<td>:</td>
	<td>{{$nilai[0]->kelas_name}}</td>
	<td>NISN</td>
	<td>:</td>
	<td>{{$student[0]->nisn}}</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>Ujian</td>
	<td>:</td>
	<td>Ujian Akhir Semester {{$nilai[0]->semester}}</td>
	<td>Tahun Pelajaran</td>
	<td>:</td>
	<td>20../20..</td>
</tr>
</table>

<table class='test' style=""  id='headerTable'>
<tr>
	<td rowspan="2">NO</td>
	<td rowspan="2" colspan="2">MATA PELAJARAN</td>
	<td colspan="5"><b>PENILAIAN AKADEMIK</b></td>
	<td colspan="3"><b>KETUNTASAN</b></td>
	<td colspan="2"><b>ATITTUDE</b></td>
</tr>
<tr>
	<td><b>KKM</b></td>
	<td><b>NU</b></td>
	<td><b>Huruf</b></td>
	<td><b>KKM</b></td>
	<td><b>NS</b></td>
	<td colspan='2'><b>Predikat</b></td>
	<td><b>Kriteria</b></td>
	<td><b>Huruf</b></td>
	<td><b>Kriteria</b></td>
</tr>
<tr>
	<td colspan="13">NORMATIF</td>
</tr>
<?php $sum = 0;
$sum2 = 0;?>
@foreach($nilai as $tasks)
<?php $sum+= $tasks->nilai_ujian;
$ns = round(((50)+(($tasks->nilai_ujian-10)*(45/80))));
$sum2+= $ns; ?>
@if($tasks->subjecttype_id == 1)

	<tr id="row{{$tasks->id}}">
	<td>{{$i+1}}</td>
	<td colspan="2">{{$tasks->subject_name}}</td>
	<td>{{$tasks->kkm_nu}}</td>
	<td>{{$tasks->nilai_ujian}}</td>
	<td>{{$f->format($tasks->nilai_ujian)}}</td>
	<td>{{$tasks->kkm_ns}}</td>
	<td>{{$ns}}</td>
	<td>@if($ns >= '85')
	A
	@elseif($ns >= '75')
	B
	@elseif($ns >= '60')
	C
	@elseif($ns >= '50')
	D
	@elseif($ns < '50')
	E
	@endif</td>
	<td>@if($ns >= '85')
	Amat Baik
	@elseif($ns >= '75')
	Baik
	@elseif($ns >= '60')
	Cukup
	@elseif($ns >= '50')
	Kurang
	@elseif($ns < '50')
	Amat Kurang
	@endif	</td>
	<td>@if($ns > $tasks->kkm_ns)
	Terlampaui
	@elseif($ns = $tasks->kkm_ns)
	Tuntas
	@elseif($ns < $tasks->kkm_ns)
	Belum Tuntas
	@endif</td>
	<td>{{$tasks->attitude}}</td>
	<td>@if($tasks->attitude == 'A')
	Amat Baik
	@elseif($tasks->attitude == 'B')
	Baik
	@elseif($tasks->attitude == 'C')
	Cukup
	@elseif($tasks->attitude == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
</tr>
<?php $i++; ?>
@endif
@endforeach

<tr>
	<td colspan="13">ADAPTIF</td>
</tr>
@foreach($nilai as $tasks)
@if($tasks->subjecttype_id == 2)
<?php
$ns = round(((50)+(($tasks->nilai_ujian-10)*(45/80))));
?>
	<tr id="row{{$tasks->id}}">
	<td>{{$i+1}}</td>
	<td colspan="2">{{$tasks->subject_name}}</td>
	<td>{{$tasks->kkm_nu}}</td>
	<td>{{$tasks->nilai_ujian}}</td>
	<td>{{$f->format($tasks->nilai_ujian)}}</td>
	<td>{{$tasks->kkm_ns}}</td>
	<td>{{$ns}}</td>
	<td>@if($ns >= '85')
	A
	@elseif($ns >= '75')
	B
	@elseif($ns >= '60')
	C
	@elseif($ns >= '50')
	D
	@elseif($ns < '50')
	E
	@endif</td>
	<td>@if($ns >= '85')
	Amat Baik
	@elseif($ns >= '75')
	Baik
	@elseif($ns >= '60')
	Cukup
	@elseif($ns >= '50')
	Kurang
	@elseif($ns < '50')
	Amat Kurang
	@endif	</td>
	<td>@if($ns > $tasks->kkm_ns)
	Terlampaui
	@elseif($ns = $tasks->kkm_ns)
	Tuntas
	@elseif($ns < $tasks->kkm_ns)
	Belum Tuntas
	@endif</td>
	<td>{{$tasks->attitude}}</td>
	<td>@if($tasks->attitude == 'A')
	Amat Baik
	@elseif($tasks->attitude == 'B')
	Baik
	@elseif($tasks->attitude == 'C')
	Cukup
	@elseif($tasks->attitude == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
</tr>
<?php $i++; ?>
@endif
@endforeach
<tr>
	<td colspan="13">DASAR KOMPETENSI</td>
</tr>
@foreach($nilai as $tasks)
@if($tasks->subjecttype_id == 3)
<?php
$ns = round(((50)+(($tasks->nilai_ujian-10)*(45/80))));
?>
	<tr id="row{{$tasks->id}}">
	<td>{{$i+1}}</td>
	<td colspan="2">{{$tasks->subject_name}}</td>
	<td>{{$tasks->kkm_nu}}</td>
	<td>{{$tasks->nilai_ujian}}</td>
	<td>{{$f->format($tasks->nilai_ujian)}}</td>
	<td>{{$tasks->kkm_ns}}</td>
	<td>{{$ns}}</td>
	<td>@if($ns >= '85')
	A
	@elseif($ns >= '75')
	B
	@elseif($ns >= '60')
	C
	@elseif($ns >= '50')
	D
	@elseif($ns < '50')
	E
	@endif</td>
	<td>@if($ns >= '85')
	Amat Baik
	@elseif($ns >= '75')
	Baik
	@elseif($ns >= '60')
	Cukup
	@elseif($ns >= '50')
	Kurang
	@elseif($ns < '50')
	Amat Kurang
	@endif	</td>
	<td>@if($ns > $tasks->kkm_ns)
	Terlampaui
	@elseif($ns = $tasks->kkm_ns)
	Tuntas
	@elseif($ns < $tasks->kkm_ns)
	Belum Tuntas
	@endif</td>
	<td>{{$tasks->attitude}}</td>
	<td>@if($tasks->attitude == 'A')
	Amat Baik
	@elseif($tasks->attitude == 'B')
	Baik
	@elseif($tasks->attitude == 'C')
	Cukup
	@elseif($tasks->attitude == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
</tr>
<?php $i++; ?>
@endif
@endforeach
<tr>
	<td colspan="13">KOMPETENSI KEJURUAN</td>
</tr>
@foreach($nilai as $tasks)
@if($tasks->subjecttype_id == 4)
<?php
$ns = round(((50)+(($tasks->nilai_ujian-10)*(45/80))));
?>
	<tr id="row{{$tasks->id}}">
	<td>{{$i+1}}</td>
	<td colspan="2">{{$tasks->subject_name}}</td>
	<td>{{$tasks->kkm_nu}}</td>
	<td>{{$tasks->nilai_ujian}}</td>
	<td>{{$f->format($tasks->nilai_ujian)}}</td>
	<td>{{$tasks->kkm_ns}}</td>
	<td>{{$ns}}</td>
	<td>@if($tasks->nilai_sekolah >= '85')
	A
	@elseif($tasks->nilai_sekolah >= '75')
	B
	@elseif($tasks->nilai_sekolah >= '60')
	C
	@elseif($tasks->nilai_sekolah >= '50')
	D
	@elseif($tasks->nilai_sekolah < '50')
	E
	@endif</td>
	<td>@if($tasks->nilai_sekolah >= '85')
	Amat Baik
	@elseif($tasks->nilai_sekolah >= '75')
	Baik
	@elseif($tasks->nilai_sekolah >= '60')
	Cukup
	@elseif($tasks->nilai_sekolah >= '50')
	Kurang
	@elseif($tasks->nilai_sekolah < '50')
	Amat Kurang
	@endif	</td>
	<td>@if($ns > $tasks->kkm_ns)
	Terlampaui
	@elseif($ns = $tasks->kkm_ns)
	Tuntas
	@elseif($ns < $tasks->kkm_ns)
	Belum Tuntas
	@endif</td>
	<td>{{$tasks->attitude}}</td>
	<td>@if($tasks->attitude == 'A')
	Amat Baik
	@elseif($tasks->attitude == 'B')
	Baik
	@elseif($tasks->attitude == 'C')
	Cukup
	@elseif($tasks->attitude == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
</tr>
<?php $i++; ?>
@endif
@endforeach
<tr>
	<td colspan="13">MUATAN LOKAL DAN PENGEMBANGAN</td>
</tr>
@foreach($nilai as $tasks)
@if($tasks->subjecttype_id == 5)
<?php
$ns = round(((50)+(($tasks->nilai_ujian-10)*(45/80))));
?>
	<tr id="row{{$tasks->id}}">
	<td>{{$i+1}}</td>
	<td colspan="2">{{$tasks->subject_name}}</td>
	<td>{{$tasks->kkm_nu}}</td>
	<td>{{$tasks->nilai_ujian}}</td>
	<td>{{$f->format($tasks->nilai_ujian)}}</td>
	<td>{{$tasks->kkm_ns}}</td>
	<td>{{$ns}}</td>
	<td>@if($tasks->nilai_sekolah >= '85')
	A
	@elseif($tasks->nilai_sekolah >= '75')
	B
	@elseif($tasks->nilai_sekolah >= '60')
	C
	@elseif($tasks->nilai_sekolah >= '50')
	D
	@elseif($tasks->nilai_sekolah < '50')
	E
	@endif</td>
	<td>@if($tasks->nilai_sekolah >= '85')
	Amat Baik
	@elseif($tasks->nilai_sekolah >= '75')
	Baik
	@elseif($tasks->nilai_sekolah >= '60')
	Cukup
	@elseif($tasks->nilai_sekolah >= '50')
	Kurang
	@elseif($tasks->nilai_sekolah < '50')
	Amat Kurang
	@endif	</td>
	<td>@if($ns > $tasks->kkm_ns)
	Terlampaui
	@elseif($ns = $tasks->kkm_ns)
	Tuntas
	@elseif($ns < $tasks->kkm_ns)
	Belum Tuntas
	@endif</td>
	<td>{{$tasks->attitude}}</td>
	<td>@if($tasks->attitude == 'A')
	Amat Baik
	@elseif($tasks->attitude == 'B')
	Baik
	@elseif($tasks->attitude == 'C')
	Cukup
	@elseif($tasks->attitude == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
</tr>
<?php $i++; ?>
@endif
@endforeach
<tr>
	<td colspan="4">JUMLAH NILAI</td>
	<td>{{$sum}}</td>
	<td colspan="2"></td>
	<td>{{$sum2}}</td>
	<td colspan="5"></td>
</tr>
<tr>
	<td colspan="6" style="border:0px">Ranking : {{$ranking+1}} Dari {{$count}} Siswa</td>
	<td colspan="6" rowspan="2" style="border:0px">
	@if($kepribadian[0]->tuntas == '1')
	Siswa Tersebut dinyatakan Tuntas/<strike>Belum Tuntas</strike>
	@else
	Siswa Tersebut dinyatakan <strike>Tuntas</strike>/Belum Tuntas
	@endif
	</br>
	@if($kepribadian[0]->lulus == '1')
	dan dinyatakan Naik/<strike>Tidak Naik</strike> ke Tingkat : 
	@else
	dan dinyatakan <strike>Naik</strike>/Tidak Naik ke Tingkat :
	@endif
	@if($str == 'X')
	XI
	@elseif($str == 'XI')
	XII
	@elseif($str == 'VII')
	VIII
	@elseif($str == 'VIII')
	IX
	@endif
	</td>
</tr>
<tr>
	<td colspan="6" style="border:0px">CATATAN PERKEMBANGAN SISWA</td>
</tr>
<tr>
	<td rowspan="4" colspan="3">KEPRIBADIAN</td>
	<td>:</td>
	<td>Kebersihan</td>
	<td>{{$kepribadian[0]->kebersihan}}</td>
	<td>@if($kepribadian[0]->kebersihan == 'A')
	Amat Baik
	@elseif($kepribadian[0]->kebersihan == 'B')
	Baik
	@elseif($kepribadian[0]->kebersihan == 'C')
	Cukup
	@elseif($kepribadian[0]->kebersihan == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
	<td rowspan="4" colspan="2">KEHADIRAN</td>
	<td>:</td>
	<td colspan="2">Sakit/Perawatan</td>
	<td colspan="2">{{$kepribadian[0]->sakit}} Hari</td>
</tr>
<tr>
	<td>:</td>
	<td>Kerapihan</td>
	<td>{{$kepribadian[0]->kerapihan}}</td>
	<td>@if($kepribadian[0]->kerapihan == 'A')
	Amat Baik
	@elseif($kepribadian[0]->kerapihan == 'B')
	Baik
	@elseif($kepribadian[0]->kerapihan == 'C')
	Cukup
	@elseif($kepribadian[0]->kerapihan == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
	<td>:</td>
	<td colspan="2">Ijin/Keperluan</td>
	<td colspan="2">{{$kepribadian[0]->ijin}} Hari</td>
</tr>
<tr>
	<td>:</td>
	<td>Ibadah</td>
	<td>{{$kepribadian[0]->ibadah}}</td>
	<td>@if($kepribadian[0]->ibadah == 'A')
	Amat Baik
	@elseif($kepribadian[0]->ibadah == 'B')
	Baik
	@elseif($kepribadian[0]->ibadah == 'C')
	Cukup
	@elseif($kepribadian[0]->ibadah == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
	<td>:</td>
	<td colspan="2">Tanpa Keterangan</td>
	<td colspan="2">{{$kepribadian[0]->tanpa_keterangan}} Hari</td>
</tr>
<tr>
	<td>:</td>
	<td>Kesantunan</td>
	<td>{{$kepribadian[0]->kesantunan}}</td>
	<td>@if($kepribadian[0]->kesantunan == 'A')
	Amat Baik
	@elseif($kepribadian[0]->kesantunan == 'B')
	Baik
	@elseif($kepribadian[0]->kesantunan == 'C')
	Cukup
	@elseif($kepribadian[0]->kesantunan == 'D')
	Kurang
	@else
	Buruk
	@endif</td>
	<td>:</td>
	<td colspan="2">Membolos</td>
	<td colspan="2">{{$kepribadian[0]->membolos}} Hari</td>
</tr>
<tr>
	<td rowspan="4" colspan="3">Untuk di perhatikan </br> catatan tambahan </br> (catatan tangan)</td>
	<td rowspan="4" colspan="10">{{$kepribadian[0]->catatan_tambahan}}</td>
</tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>
	<td style="border:0px" rowspan="4" colspan="8">Mengetahui, </br>Orang Tua/Wali</br></br></br></br>______________</td>
	<td style="border:0px" rowspan="4" colspan="5">Depok, </br>Wali Kelas</br></br></br></br>{{$jurusan[0]->kelas['teacher']->fullname}}</td>
</tr>
</table>
@endif
</div>

<iframe id="txtArea1" style="display:none"></iframe>
</body>

<script>
function myFunction(divName) {
    var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script>
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('headerTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"test.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>