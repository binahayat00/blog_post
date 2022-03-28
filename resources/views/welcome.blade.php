<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="app">
    </div>
    <script>
        window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
