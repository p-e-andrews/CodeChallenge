<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <title>Andrews CRUD Vue</title>
    <link href="{{ mix('resources/css/app.css') }}" type="text/css" rel="stylesheet" />
    <h1>Phoebe</h1>
</head>
<body>
    <div id="app"></div>
    <script src="{{ mix('resources/js/app.js') }}" type="text/javascript"></script>
</body>
</html>