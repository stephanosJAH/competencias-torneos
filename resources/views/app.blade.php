<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Inertia --}}
    {{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=smoothscroll,NodeList.prototype.forEach,Promise,Object.values,Object.assign" defer></script> --}}

    {{-- Dew CRM --}}
    {{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=String.prototype.startsWith" defer></script> --}}

    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="font-sans leading-none text-gray-700 antialiased">
    @inertia
</body>
</html>

<script>
    const baseUrl = '{{ url('/') }}';
</script>
