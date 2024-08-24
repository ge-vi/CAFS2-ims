<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
    @inertiaHead
</head>
<body>
<div class="container my-2">

    @inertia

    <footer class="row text-center">
        <div class="col py-5">
            <p class="m-0">
                IMS v1.0.5
            </p>
            <p class="m-0">
                CAFS2 Gerardas Viršuta
            </p>
            <p class="m-0">
                {{ date('Y') === '2022' ? '2022' : '2022-'.date('Y') }}
            </p>
        </div>
    </footer>
</div> <!--container-->
</body>
</html>
