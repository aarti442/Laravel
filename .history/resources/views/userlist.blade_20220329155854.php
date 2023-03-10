<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

         
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        
            <div class="content">
                <div class="title m-b-md">
                    User Lists
                </div>

                <div class="links">
                    <a href="{{ url('userlist/1') }}">User 1</a>
                    <a href="{{ url('userlist/2) }}">User 2</a>
                    <a href="{{ url('userlist/3) }}">User 3</a>
                    <a href="#">User 4</a>
                  
                </div>
            </div>
        </div>
    </body>
</html>
