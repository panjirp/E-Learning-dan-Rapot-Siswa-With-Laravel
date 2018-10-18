$(document).ready(function(){

    var url = "video";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();

        console.log(url + '/' + task_id);

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#task_id').val(data[0].id);
            $('#yutub').val(data[0].video);
            $('#save-btn').val("update");

            $('#myModal2').modal('show');
        }) 

    });

    //display modal form for creating new task
    $('.open-modal2').click(function(){
        $('#myModal2').modal('show');
        var task_id = $(this).val();

        console.log(url + '/' + task_id);

        $('#task_id').val(task_id);

        console.log(task_id);

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

                window.location = 'course&a=1';
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }});

 
 $("#save-btn").click(function (e) {
    var test = $('#yutub').val(); 
    if(test=='') 
    { 
        alert("Harap Di Isi"); 
        return false; 
    } 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

     e.preventDefault(); 
     var state = $('#save-btn').val();
     var task_id = $('#task_id').val();
     var type = "POST"; //for creating new resource
     var formData = {
        materi_id: $('#task_id').val(),
        video: $('#yutub').val(),
    }

    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + task_id;
        console.log(my_url);
    }

    console.log(task_id);
        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                window.location = 'course&a=1';
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    });
});