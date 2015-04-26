<a href="{{ $model->createUrl() }}" class="btn btn-primary navbar-btn">Create new</a>
@foreach ($rows->chunk(3) as $row)
	<div class="row">
		@foreach ($row as $instance)
			<div class="col-md-4">
				<div class="thumbnail">
				  <div class="caption">
					<h3>{{ $instance->title }}</h3>
					<p>{{ \Carbon\Carbon::parse($instance->date)->format('d.m.Y') }}</p>
					@if ($instance->published)
						<p>&check; Published</p>
					@endif
					<p>{!! $instance->text !!}</p>
					<p>
						<a href="{{ $model->editUrl($instance->id) }}" class="btn btn-primary" role="button">Edit</a>
						<a href="{{ $model->deleteUrl($instance->id) }}" class="btn btn-danger" role="button">Delete</a>
					</p>
				  </div>
				</div>
			  </div>
		@endforeach
	</div>
@endforeach
