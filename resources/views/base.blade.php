<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preload" href="resources/css/app.css" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@yield('content')
</body>
</html>
