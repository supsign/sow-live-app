<!DOCTYPE html>
<html data-textdirection="ltr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="{{ isset($robots) ? $robots : 'noindex,nofollow' }}" />
        <meta name="description" content="{{ isset($description) ? $description : '' }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <title>{{ str_replace('<br>', ',', $title) }} | SOW 2021 Arosa</title>

        <link rel="alternate" hreflang="x-default" href="@php echo url()->full(); @endphp" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>

    <body>
        <div class="flex flex-col h-screen">
<x-layout.header
    :title="$title"
    :heading="$heading"
    :desc="$desc"
     />

<div id="app" class="flex-grow">
    {{$slot}}
</div>

<x-layout.footer />
        </div>

</body>

</html>