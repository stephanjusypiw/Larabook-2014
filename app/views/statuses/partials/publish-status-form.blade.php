
@include('layouts.partials.errors')

<div class="status-post">
    {{ Form::open(['route' => 'statuses_path']) }}
    <div class="form-group">
        {{ Form::textarea('body', null,
          ['rows' => 3, 'class' => 'form-control', 'placeholder' => 'What up?']) }}
    </div>

    <div class="form-group status-post-submit">
        {{ Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) }}
    </div>
    {{ Form::close() }}
</div>