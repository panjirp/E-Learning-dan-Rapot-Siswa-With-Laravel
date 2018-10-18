$(document).ready(function(){

    var url = "guru";
    var url2 = "userguru";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();

        console.log(url + '/' + task_id);

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data[0]);
            $('#task_id').val(data[0].id);
            $('#name').val(data[0].fullname);
            $('#nip').val(data[0].nip);
            $('#alamat').val(data[0].address);
            $('#tempat').val(data[0].birth_place);
            $('#tgl').val(data[0].birth_date);
            $('#agama').val(data[0].religion.id);
            $('#jk').val(data[0].sex.id);
            $('#telp').val(data[0].phone_number);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    $('.open-modal-user').click(function(){
        var task_id = $(this).val();

        console.log(url + '/' + task_id);

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data[0]);
            $('#task_id').val(data[0].user_id);
            $('#username').val(data[0].user.username);
            $('#btn-save-user').val("update");

            $('#myModal2').modal('show');
        }) 
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmTasks').trigger("reset");
        $('#myModal').modal('show');
    });

    $('#btn-add-user').click(function(){
        var task_id = $(this).val();
        console.log(task_id);
        $('#task_id').val(task_id);
        $('#btn-save-user').val("add");
        $('#frmTasks2').trigger("reset");
        $('#myModal2').modal('show');
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

    //delete task and remove it from list
    $('.delete-user').click(function(){
        if (confirm('Anda Yakin Ingin Menghapus Data Ini?')) {
        var task_id = $(this).val();

$.ajax({

            type: "DELETE",
            url: url2 + '/' + task_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                console.log(data);

                window.location = 'guru';
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
            fullname: $('#name').val(),
            nip: $('#nip').val(),
            address: $('#alamat').val(),
            birth_place: $('#tempat').val(),
            birth_date: $('#tgl').val(),
            religion_id: $('#agama').val(),
            sex_id: $('#jk').val(),
            phone_number: $('#telp').val(),
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
                   window.location = 'guru';
                }else{ //if user updated an existing record
                  window.location = 'guru';
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new task / update existing task
    $("#btn-save-user").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

       var formData = {
            username: $('#username').val(),
            password: $('#password').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save-user').val();

        var type = "POST"; //for creating new resource
        var task_id = $('#task_id').val();
        var my_url = url2 + '/' + task_id;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
        }

        console.log(my_url);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                


                if (state == "add"){ //if user added a new record
                   window.location = 'guru';
                }else{ //if user updated an existing record
                  window.location = 'guru';
                }

                $('#frmTasks2').trigger("reset");

                $('#myModal2').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});