jQuery(document).ready(function ($){

	jQuery('#add').click(function() {
        jQuery('#btn-save').val("add");
        jQuery('#form-data').trigger("reset");
        jQuery('#form').modal('show');
	});

	// open edit data modal update
    jQuery('body').on('click', '.edit_modal', function () {
        var id = $(this).val();
        $.get('/surat/' + id, function (data) {
            jQuery('#id').val(data.id);
            jQuery('#subject').val(data.subject);
            jQuery('#body').val(data.body);
            jQuery('#btn-save').val("update");
            jQuery('#form').modal('show');
        })
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            url: jQuery('#subject').val(),
            description: jQuery('#body').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var id = jQuery('#id').val();
        var ajaxurl = 'surat';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'surat/' + id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var surat = '' + data.id + '' + data.subject + '' + data.body + '';
                surat += ' ';
                surat += '';
                if (state == "add") {
                    jQuery('#surat_list').append(surat);
                } else {
                    $("#surat" + id).replaceWith(surat);
                }
                jQuery('#form-data').trigger("reset");
                jQuery('#form').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});