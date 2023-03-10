<!DOCTYPE html>
<html>
<head>
    <title>Photo App</title>
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

<h1>Showing {{ $photos['id'] }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $photos['backend'] }}</h2>
        <p>
            <strong>Backend:</strong> {{ $photos['backend'] }}<br>
            <strong>Frontend:</strong> {{ $photos['frontend'] }}
        </p>
    </div>

</div>
</body>
</html>