<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $data['title'] }}</title>
        <style>
            body {
                font-family: arial, serif;
            }
            .body-title {
                display: block;
                margin: auto;
                width: 800px;
            }
            .body-preview {
                display: block;
                margin: auto;
                width: 800px;
                height: 500px;
                overflow-y: auto;
                border: 1px solid #ccc;
                padding: 5px 10px;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <div class="body-title">
            <h2>{{ $data['title'] }}</h2>
        </div>
        <div class="body-preview">
            {{ View::make($template,$data) }}
        </div>
    </body>
</html>