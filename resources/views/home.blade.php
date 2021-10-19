<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Important to work AJAX CSRF -->
    <meta name="_token" content="{!! csrf_token() !!}" />

	<link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<title>Home - Generate Surat</title>
</head>
<body>

<!-- container -->
<div class="container">

	<!-- card -->
	<div class="card mt-3">
		<div class="card-body">
			<h2 class="text-center">Generate Surat</h2>
			<button id="add" name="add" class="btn btn-info float-right mt-3 mb-3">
				Create
			</button>

			<!-- table -->
			<table class="table table-hover" id="gsrt">
				<thead>
					<th>No</th>
					<th>Subject</th>
					<th>Action</th>
				</thead>
				<tbody id="surat_list" name="surat_list">
					@foreach($surat as $srt)
					<tr id="surat">
						<td>{{$loop->iteration()}}</td>
						<td>{{$srt->subject ?? 'null'}}</td>
						<td>
							<button class="btn btn-sm btn-detail edit_modal">
								<i class="fas fa-edit"></i>
							</button>
							<button class="btn btn-sm btn-delete delete-product">
								<i class="fas fa-trash"></i>
							</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

<!-- Modal Create -->
<div class="modal fade" id="form" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Buat Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" name="frmSurat" id="frmSurat" novalidate="">
        	<div class="form-group">
        		<label for="" class="label">Subject</label>
        		<input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}">
        	</div>
        	<div class="form-group">
        		<label for="" class="label">Body</label>
        		<textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
        <button type="submit" class="btn btn-primary" id="btn-save" value="save">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal create -->

<!-- modal edit -->

<div class="modal fade" id="form-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Buat Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" name="form-edit" id="form-edit" novalidate="">
        	<div class="form-group">
        		<label for="" class="label">Subject</label>
        		<input type="text" class="form-control" id="subject" name="subject" value="">
        	</div>
        	<div class="form-group">
        		<label for="" class="label">Body</label>
        		<textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
        <button type="submit" class="btn btn-primary" id="btn-save" value="save">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- end modal edit -->

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="{{asset('/js/home/ajax.js')}}"></script>
<!-- <script>
$('#form').on('shown.bs.modal', function () {
  $('#form').trigger('focus')
})
</script> -->
</body>
</html>