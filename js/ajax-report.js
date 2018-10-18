$(document).ready(function(){

    var url = "report";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();
        var task_id2 = $('#task_id2').val();
        var task_id3 = $('#task_id3').val();
        var smt = $('#semester').val();

        console.log(url + '/' + task_id + '/' + task_id2+ '/' + smt);

        $.get(url + '/' + task_id + '/' + task_id2 + '/' + smt, function (data) {
            //success data
            console.log(data);
            $('#task_id').val(data[0].id_student);
            if(!data[0].id_nilai){
                var nilai = 0;
            }else{
                var nilai = data[0].id_nilai;
            }
            $('#task_id3').val(nilai);
            $('#name').val(data[0].fullname);
            $('#nis').val(data[0].nis);
            $('#nisn').val(data[0].nisn);
            $('#kkm_nu').val(data[0].kkm_nu);
            $('#nu').val(data[0].nilai_ujian);
            $('#kkm_ns').val(data[0].kkm_ns);
            $('#attitude').val(data[0].attitude);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmTasks').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete task and remove it from list
    $('.delete-task').click(function(){
        if (confirm('Anda Yakin Ingin Menghapus Data Ini?')) {
        var task_id = $(this).val();

$.ajax({

            type: "DELETE",
            url: url + '/' + task_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                console.log(data);

                $("#row" + task_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }});

    //create new task / update existing task
    $("#btn-save").click(function (e) {
        var test = $('#attitude').val(); 
    if(test=='') 
    { 
        alert("Kolom Attitude Harap Di Isi"); 
        return false; 
    } 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

       var formData = {
            student_id: $('#task_id').val(),
            schedule_id: $('#task_id2').val(),
            subject_name: $('#subject').val(),
            subjecttype_id: $('#subjecttype_id').val(),
            semester: $('#semester').val(),
            kelas_name: $('#kelas').val(),
            teacher_id: $('#teacher_id').val(),
            kkm_nu: $('#kkm_nu').val(),
            nilai_ujian: $('#nu').val(),
            kkm_ns: $('#kkm_ns').val(),
            attitude: $('#attitude').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var task_id = $('#task_id').val();
        var task_id2 = $('#task_id2').val();
        var task_id3 = $('#task_id3').val();
        var my_url = url + '/' + task_id + '/' + task_id2 + '/' + task_id3;
        console.log(my_url);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                


                if (state == "add"){ //if user added a new record
                   window.location.reload();
                }else{ //if user updated an existing record
                  window.location.reload();
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});