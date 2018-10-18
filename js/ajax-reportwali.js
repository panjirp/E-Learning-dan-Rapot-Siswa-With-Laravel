$(document).ready(function(){

    var url = "reportwali";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();

        console.log(url + '/' + task_id);

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#task_id').val(data[0].id_student);
            $('#task_id2').val(data[0].id_catatansiswa);
            $('#name').val(data[0].fullname);
            $('#nis').val(data[0].nis);
            $('#nisn').val(data[0].nisn);
            $('#kebersihan').val(data[0].kebersihan);
            $('#kerapihan').val(data[0].kerapihan);
            $('#ibadah').val(data[0].ibadah);
            $('#kesantunan').val(data[0].kesantunan);
            $('#sakit').val(data[0].sakit);
            $('#ijin').val(data[0].ijin);
            $('#tk').val(data[0].tanpa_keterangan);
            $('#membolos').val(data[0].membolos);
            
            $('#catatan_tambahan').val(data[0].catatan_tambahan);
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

       var formData = {
            student_id: $('#task_id').val(),
            semester: $('#semester').val(),
            teacher_id: $('#teacher_id').val(),
            kelas_name: $('#kelas').val(),
            kebersihan: $('#kebersihan').val(),
            kerapihan: $('#kerapihan').val(),
            ibadah: $('#ibadah').val(),
            kesantunan: $('#kesantunan').val(),
            sakit: $('#sakit').val(),
            ijin: $('#ijin').val(),
            tanpa_keterangan: $('#tk').val(),
            membolos: $('#membolos').val(),
            catatan_tambahan: $('#catatan_tambahan').val(),
            tuntas: $('input[name=tuntas]:checked').val(),
            lulus: $('input[name=lulus]:checked').val(),
            
        }
        console.log($('input[name=tuntas]:checked').val());
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var task_id = $('#task_id').val();
        var task_id2 = $('#task_id2').val();
        var my_url = url + '/' + task_id + '/' + task_id2;
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