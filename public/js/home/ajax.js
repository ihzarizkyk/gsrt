$(document).ready(function() {
	var url = $('#url').val();

    //display modal form for creating new product *********************
    $('#add').click(function(){
        $('#btn-save').val("add");
        $('#frmSurat').trigger("reset");
        $('#form').modal('show');
    });
});


//display modal form for product EDIT ***************************
$(document).on('click','.open_modal',function(){
        var id = $(this).val();
       
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/surat/' + id,
            success: function (data) {
                console.log(data);
                $('#id').val(data.id);
                $('#subject').val(data.subject);
                $('#body').val(data.body);
                $('#btn-save').val("update");
                $('#form').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //create new surat / update existing surat ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 
        var formData = {
            subject: $('#subject').val(),
            body: $('#body').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var id = $('#id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/surat/' + id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var surat = '<tr id="surat' + data.id + '"><td>' + data.id + '</td><td>' + data.subject + '</td>';
                surat += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                surat += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#surat_list').append(surat);
                }else{ //if user updated an existing record
                    $("#surat" + id).replaceWith( surat );
                }
                $('#frmSurat').trigger("reset");
                $('#form').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });