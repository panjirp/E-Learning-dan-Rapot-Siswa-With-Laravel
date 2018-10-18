$(document).ready(function(){

    var url = "latihan";
    var url2 = "addquestion";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();

        console.log(url + '/' + task_id);

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#task_id').val(data[0].id);
            $('#quest').val(data[0].question);
            $('#answer1').val(data[0].answer[0].answer);
            $('#answer2').val(data[0].answer[1].answer);
            $('#answer3').val(data[0].answer[2].answer);
            $('#answer4').val(data[0].answer[3].answer);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 

    });

    //display modal form for creating new task
    $('.open-modal2').click(function(){
        $('#myModal').modal('show');
        var task_id = $(this).val();

        console.log(url + '/' + task_id);

        $('#task_id').val(task_id);

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

    //create new task / update existing task
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

       var formData = {
            question: $('#quest').val(),
            answer1: $('#answer1').val(),
            answer2: $('#answer2').val(),
            answer3: $('#answer3').val(),
            answer4: $('#answer4').val(),
            iscorrect: document.querySelector('input[name = "iscorrect"]:checked').value,
        }
        console.log(formData);
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var task_id = $('#task_id').val();
        var my_url = url2 + '/' + task_id;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
        var my_url = url + '/' + task_id;
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
                   window.location = 'course&a=1';
                }else{ //if user updated an existing record
                  window.location = 'course&a=1';
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


 $("#save-btn").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

     e.preventDefault(); 

     var formData = new FormData();
                    var ins = document.getElementById('multifile').files.length;
                    for (var x = 0; x < ins; x++) {
                        formData.append("file[]", document.getElementById('multifile').files[x]);
                    }
       var task_id = $('#task_id').val();

        $.ajax({

            type: "POST",
            url: url + '/' + task_id,
            data: formData,
             async: false,
             processData: false,
             cache: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                console.log(data);

                window.location = 'latihan&a=1';
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    });
});