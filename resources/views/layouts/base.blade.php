<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ $meta ?? '' }}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite("resources/js/vertical-slider.js")
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body class= " max-w-screen bg-[url('unsplash.jpg')] bg-cover" x-data="{ openMenu : false }"
:class="openMenu ? 'overflow-hidden' : 'overflow-visible' ">

  @include("layouts.partials.header")

  @include("web.sections.welcome")
  @include("web.sections.info")
  @include("web.sections.kurs")
    @include("web.sections.reviews")
</body>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


</html>
