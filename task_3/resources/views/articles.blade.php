<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>
    {!! Form::open(['url' => 'foo/bar']) !!}
    {!! Form::label('email', 'E-Mail Address', ['class' => 'awesome']) !!}
    {!! Form::text('username') !!}
    {!! Form::submit('submit') !!}
    {!! Form::close() !!}
</body>
</html>