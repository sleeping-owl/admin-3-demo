<p>This route is registered in <code>app/admin/routes.php</code> file.</p>
<form action="{{ route('my-form.post') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<div class="form-group">
		<label>Title</label>
		<input class="form-control" name="title" type="text" id="title" value="" />
	</div>
	<div class="form-group">
		<input type="submit" value="Submit" class="btn btn-primary">
	</div>
</form>