$(document).ready(function(){

    var url = "kelas";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();

        console.log(url + '/' + task_id);

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data.jurusan.name);
            $('#task_id').val(data.kelas.id);
            $('#name').val(data.kelas.name);
            $('#jrsn').val(data.jurusan.id);
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
            name: $('#name').val(),
            vocational_id: $('#jrsn').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var task_id = $('#task_id').val();
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + task_id;
            console.log(my_url);
        }

        

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                


                if (state == "add"){ //if user added a new record
                    if($('#jrsn').val() == '3'){
                        window.location = 'class&j=smp';
                    }else{
                        window.location = 'class&j=smk';
                    }
                    
                }else{ //if user updated an existing record

                    if($('#jrsn').val() == '3'){
                        var task = '<td id="task' + data.id + '">' + data.kelas.name + '</td>';
                        $("#task" + task_id).replaceWith( task );
                    }else{
                        var task = '<td id="task' + data.kelas.id + '">' + data.kelas.name + '</td>';
                        var task2 = '<td id="task2' + data.kelas.id + '">' + data.jurusan.name + '</td>';
                        $("#task" + task_id).replaceWith( task );
                        $("#task2" + task_id).replaceWith( task2 );
                    }
                    
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