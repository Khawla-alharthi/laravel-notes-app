<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Note Application</title>

    </head>
    <body class="antialiased">
        <h1>Home</h1>
       <a class="btn btn-primary" href="/addNote.blade.php" role="button">Link</a>
       <a class="btn btn-primary" href="/editNote.blade.php" role="button">Link</a>
    </body>
</html>
