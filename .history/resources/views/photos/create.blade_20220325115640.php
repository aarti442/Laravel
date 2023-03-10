<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('photos') }}">Technology</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('photos') }}">View All Photos</a></li>
        <li><a href="{{ URL::to('photos/create') }}">Create a Photo</a>
    </ul>
</nav>

<h1>Create </h1>


{{ Form::open(array('url' => 'photos')) }}

    <div class="form-group">
        {{ Form::label('id', 'ID') }}
        {{ Form::text('id', Input::old('id'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('frontend', 'FrontEnd') }}
        {{ Form::email('frontend', Input::old('frontend'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('backend', 'Backend') }}
        {{ Form::select('backend', Input::old('backend'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>