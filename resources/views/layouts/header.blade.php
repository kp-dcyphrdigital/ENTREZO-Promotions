<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Cantarell" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/bulma.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>