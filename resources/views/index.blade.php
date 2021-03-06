<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="3rule">
  <meta name="robots" content="noindex,nofollow">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', '3rule') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <!-- Styles -->
  <!-- <link href="{{ asset('css/reset.css') }}" rel="stylesheet"> -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
  <div id="app"></div>

  <!-- Scripts -->
  <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
  <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>