$('.edit-modal').on('click').function()
{
	var id = $(this).data('id')
	$.ajax({
		url:'/surat/${id}/edit',
		method:'GET',
		success: function(data){

		},
		error:function(data)
	})
}

$('.delete-modal').on('click').function()
{
	var id = $(this).data('id')
	$.ajax({
		url:'/surat/${id}/edit',
		method:'GET',
		success: function(data){

		},
		error:function(data)
	})
}

$('.create-modal').on('click').function()
{
	// var id = $(this).data('id')
	$.ajax({
		url:'/surat',
		method:'POST',
		success: function(data){

		},
		error:function(data)
	})
}

$('.edit-modal').on('click').function()
{
	// var id = $(this).data('id')
	$.ajax({
		url:'/surat/update',
		method:'PATCH',
		success: function(data){

		},
		error:function(data)
	})
}