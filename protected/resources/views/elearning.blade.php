<article class="module width_full">
	<header><h3>E-LEARNING</h3></header>
		<div class="module_content">
		
<ul>
@foreach($kelas as $kls)
<li>{{$kls->name}}</li>
<ul>
@foreach($schedule as $sch)
@if($sch->kelas_id == $kls->id)
<li><a href='elearningadmin&a={{$sch->id}}'>{{$sch->subject['name']}}</a></li>
@endif
@endforeach
</ul>
@endforeach
</ul>
