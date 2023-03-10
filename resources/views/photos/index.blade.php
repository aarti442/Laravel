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

    <h1>List Photos</h1>
    <div class="jumbotron text-center">
        <table border="1" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>FrontEnd</td>
                    <td>Backend</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
            @foreach($photos as $key => $value)
                <tr>
                    <td>{{ $value['frontend']}}</td>
                    <td>{{ $value['backend']}}</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('photos/' . $value['id']) }}">View</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('photos/' . $value['id']. '/edit') }}">Edit </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

